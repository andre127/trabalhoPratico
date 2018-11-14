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
import unigran.projeto.br.Listagem.ListarCliente;
import unigran.projeto.br.Listagem.ListarVeiculo;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.locaplus.R;

public class LocacaoRetirada extends AppCompatActivity {
    private EditText numeroRetirada, placaRetirada, dataRetirada, kmRetirada, horaRetirada;
    private SQLiteDatabase conexao;
    private Banco bd;
    private Locacao locacao;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_locacao_retirada);
        numeroRetirada = findViewById(R.id.etNumeroRetirada);
        placaRetirada = findViewById(R.id.etPlacaRetirada);
        dataRetirada = findViewById(R.id.etDataRetirada);
        kmRetirada = findViewById(R.id.etKmRetirada);
        horaRetirada = findViewById(R.id.etHoraRetirada);
    }
    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
        if (locacao == null)
            locacao = new Locacao();
        locacao.setDataRetirada(Float.parseFloat(dataRetirada.getText().toString()));
        locacao.setKmFinal(Float.parseFloat(kmRetirada.getText().toString()));
        locacao.setHora(Float.parseFloat(horaRetirada.getText().toString()));
        locacao.getCliente().setId(Integer.parseInt(numeroRetirada.getText().toString()));
        locacao.getVeiculo().setPlaca(placaRetirada.getText().toString());

        bd = new Banco(this);
        try{
            conexao = bd.getWritableDatabase();
            ContentValues values = new ContentValues();
            values.put("ID_CLIENTE_LOCACAO",locacao.getCliente().getId());
            values.put("PLACA_CARRO", locacao.getVeiculo().getPlaca());
            values.put("DATA_LOCACAO", locacao.getDataRetirada());
            values.put("KM_LOCACAO", locacao.getKmFinal());
            if(locacao.getId()<=0)
                conexao.insertOrThrow("Locacao",null,values);
            else
                conexao.update("LOCACAO", values,"ID=?",new String[]{locacao.getId()+""});
            conexao.close();
            Toast.makeText(this, "Yeahh",Toast.LENGTH_SHORT).show();
        }catch (SQLException e){
            Toast.makeText(this, "erro na inserção",Toast.LENGTH_SHORT).show();
        }
    }
    public void cancelar(View view){
        Intent it = new Intent(this, GerenciamentoLocacao.class);
        startActivity(it);
    }
    public void listarCliente(View view){
        Intent it = new Intent(this, ListarCliente.class);
        startActivity(it);
    }
    public void listarVeiculo(View view){
        Intent it = new Intent(this, ListarVeiculo.class);
        startActivity(it);
    }
}
