package unigran.projeto.br.gerenciamentoLocacao;

import android.content.ContentValues;
import android.content.Intent;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.Classes.Locacao;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.locaplus.R;

public class LocacaoRetirada extends AppCompatActivity {
    private EditText cpfCliente, cpfFuncionario, placaCarro, dataRetirada, kmRetirada;
    private SQLiteDatabase conexao;
    private Banco bd;
    private Locacao locacao;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_locacao_retirada);
        cpfCliente = findViewById(R.id.etCpfCliente);
        cpfFuncionario = findViewById(R.id.etCpfFuncionario);
        placaCarro = findViewById(R.id.etPlacaCarro);
        dataRetirada = findViewById(R.id.etDataRetirada);
        kmRetirada = findViewById(R.id.etKmRetirada);

        locacao =(Locacao) getIntent().getSerializableExtra("locacao");
        if(locacao!=null){
            cpfCliente.setText(locacao.getCliente().getCpf());
            //cpfFuncionario.setText(locacao.get);
            placaCarro.setText(locacao.getVeiculo().getPlaca());
            dataRetirada.setText(locacao.getDataRetirada().toString());
            kmRetirada.setText(locacao.getKmFinal().toString());

        }
    }
    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
        if(valida()){
            if(locacao==null)
                locacao = new Locacao();
            locacao.setDataRetirada(Float.parseFloat(dataRetirada.getText().toString()));
            locacao.setKmFinal(Float.parseFloat(kmRetirada.getText().toString()));
            //locacao.getCliente().setCpf(cpfCliente.getText().toString());
            //locacao.getVeiculo().setPlaca(placaCarro.getText().toString());
            inserir();
        }

    }

    private void inserir() {
        bd = new Banco(this);
        try{
            conexao = bd.getWritableDatabase();
            ContentValues values = new ContentValues();
            values.put("dataLocacao", locacao.getDataRetirada());
            values.put("quilometragem", locacao.getKmFinal());
            if(locacao.getId()<=0)
                conexao.insertOrThrow("locacao",null,values);
            else
                conexao.update("locacao", values,"id=?",new String[]{locacao.getId()+""});
            conexao.close();
            Toast.makeText(this, "Yeahh",Toast.LENGTH_SHORT).show();
        }catch (SQLException e){
            Toast.makeText(this, "erro na inserção",Toast.LENGTH_SHORT).show();
        }
    }

    private boolean valida() {
        return  true;
    }

    public void cancelar(View view){

    }
    public void listarCliente(View view){
       // Intent it = new Intent(this, ListarCliente.class);
       // startActivity(it);
    }
    public void listarVeiculo(View view){
       // Intent it = new Intent(this, ListarVeiculo.class);
       // startActivity(it);
    }
}
