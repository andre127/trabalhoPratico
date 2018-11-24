package unigran.projeto.br.Listagem;

import android.app.AlertDialog;
import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import java.util.LinkedList;
import java.util.List;

import unigran.projeto.br.Classes.Cliente;
import unigran.projeto.br.Classes.Locacao;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.gerenciamentoLocacao.LocacaoRetirada;
import unigran.projeto.br.locaplus.CadastroCliente;
import unigran.projeto.br.locaplus.MainActivity;
import unigran.projeto.br.locaplus.R;

public class ListarLocacao extends AppCompatActivity {
    private ListView listaLocacao;
    private SQLiteDatabase conexao;
    private Banco bd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listar_locacao);
        listaLocacao = findViewById(R.id.lvLocacoes);//mapeando listview
        //acoes();
        BancoDados();
    }
    //funçao para listar na tela as locacaçoes ativas e inativas
    private List listar() {
        conexao=bd.getReadableDatabase();
        List locacoes = new LinkedList();
        Cursor res= conexao.rawQuery("SELECT * FROM LOCACAO", null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                //pegando dados do banco e passadno para uma lista para listar
                Locacao loc = new Locacao();
                loc.setId(res.getInt(res.getColumnIndexOrThrow("ID_LOCACAO")));
                loc.setDataRetirada(res.getInt(res.getColumnIndexOrThrow("DATALOCACAO")));
                loc.setDataDevolucao(res.getInt(res.getColumnIndexOrThrow("DATADEVOLUCAO")));
                loc.setKm(res.getInt(res.getColumnIndexOrThrow("QUILOMETRAGEM")));
                loc.setCpfCliene(res.getInt(res.getColumnIndexOrThrow("CPFCLIENTE")));
                loc.setCpfFuncionario(res.getInt(res.getColumnIndexOrThrow("CPFFUNCIONARIO")));
                loc.setPlacaCarro(res.getString(res.getColumnIndexOrThrow("PLACACARRO")));
                loc.setSituaçaos(res.getString(res.getColumnIndexOrThrow("SITUACAO")));
                locacoes.add(loc);
            }while (res.moveToNext());
        }
        return  locacoes;//retornado a lista
    }

    private void BancoDados() {
        //tratanto caso de erro na conexao
        try {
            bd= new Banco(this);
            Toast.makeText(this,"Conexão ok",Toast.LENGTH_LONG).show();

        }catch (SQLException ex){
            AlertDialog.Builder msg= new AlertDialog.Builder(this);
            msg.setTitle("Erro");
            msg.setMessage("Erro de conexão");
            msg.setNegativeButton("ok",null);
            msg.show();
        }
    }

  /*  private void acoes() {
        //ao clicar no item da lista puxar os dados e a tela de cadastro preenchendo com os dados do BD, permitindo editar
        listaLocacao.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override

            public void onItemClick(AdapterView adapterView,View view, int i, long l){
                Intent edicao = new Intent(ListarLocacao.this, LocacaoRetirada.class);
                Locacao locacao = (Locacao) adapterView.getItemAtPosition(i);
                edicao.putExtra("locar", locacao);
                startActivity(edicao);
            }
        });
    }*/

    public  void home(View view){
        //chama a tela de cadastro
        Intent it = new Intent(ListarLocacao.this,MainActivity.class);
        startActivity(it);

    }

    @Override
    protected void onResume() {
        super.onResume();
        ArrayAdapter<Locacao> arrayAdapter = new ArrayAdapter<Locacao>(ListarLocacao.this,android.R.layout.simple_list_item_1,listar());
        listaLocacao.setAdapter(arrayAdapter);
    }
}
