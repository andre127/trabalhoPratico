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
import unigran.projeto.br.locaplus.R;

public class ListarLocacao extends AppCompatActivity {
    private ListView listaLocacao;
    private SQLiteDatabase conexao;
    private Banco bd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listar_locacao);
        listaLocacao = findViewById(R.id.lvLocacoes);
        acoes();
        BancoDados();
    }

    private void BancoDados() {
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

    private void acoes() {
        listaLocacao.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override

            public void onItemClick(AdapterView adapterView,View view, int i, long l){
                Intent it = new Intent(ListarLocacao.this,LocacaoRetirada.class);
                Locacao locacao = (Locacao) adapterView.getItemAtPosition(i);
                it.putExtra("locacao", locacao);
                startActivity(it);
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        ArrayAdapter<Locacao> arrayAdapter = new ArrayAdapter<Locacao>(this,android.R.layout.simple_list_item_1,listar());
        listaLocacao.setAdapter(arrayAdapter);
    }

    private List listar() {
        conexao=bd.getReadableDatabase();
        List locacoes = new LinkedList();
        Cursor res= conexao.rawQuery("SELECT * FROM locacao", null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                Locacao loc = new Locacao();
                loc.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
                loc.setDataRetirada(res.getFloat(res.getColumnIndexOrThrow("dataDevolucao")));
                loc.setKmFinal(res.getFloat(res.getColumnIndexOrThrow("quilometragem")));
                locacoes.add(loc);
            }while (res.moveToNext());
        }
        return  locacoes;
    }

    public  void cadastrar(View view){
        Intent it = new Intent(this, LocacaoRetirada.class);
        startActivity(it);

    }
}
