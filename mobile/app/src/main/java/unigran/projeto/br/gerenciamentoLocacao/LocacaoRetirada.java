package unigran.projeto.br.gerenciamentoLocacao;

import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;

import unigran.projeto.br.Classes.Locacao;
import unigran.projeto.br.Classes.Veiculo;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.locaplus.ListarCpfCliente;
import unigran.projeto.br.locaplus.R;

public class LocacaoRetirada extends AppCompatActivity{
    private EditText cpfCliente, idFuncionario,placaCarro, dataRetirada,dataDevolucao, kmInicial,kmFinal;
    private SQLiteDatabase conexao;
    private Banco bd;
    private Locacao locacao;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_locacao_retirada);
        idFuncionario = findViewById(R.id.etIdFuncionario);
        cpfCliente = findViewById(R.id.etICpfCliente);
        placaCarro = findViewById(R.id.etPlacaCarro);
        dataRetirada = findViewById(R.id.etDataRetirada);
        kmInicial = findViewById(R.id.etKmInicial);
        kmFinal = findViewById(R.id.etKmFinal);
        dataDevolucao = findViewById(R.id.etDataDevolucao);

        Veiculo veiculo =(Veiculo) getIntent().getSerializableExtra("locacao");
       // Locacao locacao =(Locacao) getIntent().getSerializableExtra("locar");
        if(locacao==null) {
            locacao = new Locacao();
            locacao.setPlacaCarro(veiculo.getPlaca());

        }

        if(locacao!=null){
           if(locacao.getIdCliente()!=null) cpfCliente.setText(locacao.getIdCliente());
            if(locacao.getIdFuncionario()!=null) idFuncionario.setText(locacao.getIdFuncionario());
            if(locacao.getPlacaCarro()!=null) placaCarro.setText(locacao.getPlacaCarro());
            if(locacao.getDataRetirada()!=null) dataRetirada.setText(locacao.getDataRetirada().toString());
            if(locacao.getKmInicial()!=null) kmInicial.setText(locacao.getKmInicial().toString());
            if(locacao.getKmFinal()!=null)kmFinal.setText(locacao.getKmFinal().toString());
            if(locacao.getDataDevolucao()!=null) dataDevolucao.setText(locacao.getDataDevolucao().toString());
        }

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode==50){
            cpfCliente.setText(data.getStringExtra("cpf"));
        }
    }

    /*public void confirmar(View view){
                Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
                if(valida()){
                    if(locacao==null)
                        locacao = new Locacao();
                    locacao.setDataRetirada(Float.parseFloat(dataRetirada.getText().toString()));
                    //locacao.setKmFinal(Float.parseFloat(kmRetirada.getText().toString()));
                    //locacao.getCliente().setCpf(idCliente.getText().toString());
                    //locacao.getVeiculo().setPlaca(placaCarro.getText().toString());
                    inserir();
                }

            }
        */
   /* private void inserir() {
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
*/
    private boolean valida() {
        return  true;
    }

    public void cancelar(View view){

    }
    public void listarCliente(View view){
       Intent it = new Intent(this, ListarCpfCliente.class);
       startActivity(it);
    }
    public void listarVeiculo(View view){
       // Intent it = new Intent(this, ListarVeiculo.class);
       // startActivity(it);
    }
}
