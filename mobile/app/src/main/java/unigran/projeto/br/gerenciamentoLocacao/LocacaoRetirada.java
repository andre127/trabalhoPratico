package unigran.projeto.br.gerenciamentoLocacao;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.Intent;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.Classes.Locacao;
import unigran.projeto.br.Classes.Veiculo;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.locaplus.ListarCpfCliente;
import unigran.projeto.br.locaplus.R;

public class LocacaoRetirada extends AppCompatActivity{
    private EditText cpfCliente, cpfFuncionario,placa, dataRetirada,dataDevolucao, km, situacao;
    private SQLiteDatabase conexao;
    private Banco bd;
    private Locacao locacao;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_locacao_retirada);
        //mapeando os componentes para variaveis
        cpfFuncionario = findViewById(R.id.etCpfFuncionario);
        cpfCliente = findViewById(R.id.etCpfCliente);
        placa = findViewById(R.id.etPlaca);
        dataRetirada = findViewById(R.id.etDataRetirada);
        km = findViewById(R.id.etKm);
        dataDevolucao = findViewById(R.id.etDataDevolucao);
        situacao = findViewById(R.id.etSituacao);

        Veiculo veiculo =(Veiculo) getIntent().getSerializableExtra("locacao");
        if(locacao==null) {
            locacao = new Locacao();
            locacao.setPlacaCarro(veiculo.getPlaca());

        }

        // Locacao locacao =(Locacao) getIntent().getSerializableExtra("locar");
        if(locacao!=null){
           if(locacao.getCpfCliene()!=null) cpfCliente.setText(locacao.getCpfCliene());
            if(locacao.getCpfFuncionario()!=null) cpfFuncionario.setText(locacao.getCpfFuncionario());
            if(locacao.getPlacaCarro()!=null) placa.setText(locacao.getPlacaCarro());
            if(locacao.getDataRetirada()!=null) dataRetirada.setText(locacao.getDataRetirada());
            if(locacao.getKm()!=null) km.setText(locacao.getKm());
            if(locacao.getDataDevolucao()!=null) dataDevolucao.setText(locacao.getDataDevolucao());
            if(locacao.getSituaçaos()!=null) situacao.setText(locacao.getSituaçaos());
        }

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        //if (resultCode==50){
            cpfCliente.setText(data.getStringExtra("cpf"));
       // }
    }

    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
        if(locacao==null)
            locacao = new Locacao();
        //pegando os dados das variaveis mapeadas e passando apara a classe pessoa
        locacao.setDataRetirada(Integer.parseInt(dataRetirada.getText().toString()));
        locacao.setDataDevolucao(Integer.parseInt(dataDevolucao.getText().toString()));
        locacao.setKm(Integer.parseInt(km.getText().toString()));
        locacao.setCpfCliene(Integer.parseInt(cpfCliente.getText().toString()));
        locacao.setCpfFuncionario(Integer.parseInt(cpfFuncionario.getText().toString()));
        locacao.setPlacaCarro(placa.getText().toString());
        locacao.setSituaçaos(situacao.getText().toString());
        inserir();
        finish();


    }
    private void inserir() {
        bd = new Banco(this);
        //verificaçao do bd
        try{
            conexao = bd.getWritableDatabase();//função para escrita no bd
            ContentValues values = new ContentValues();
            values.put("DATALOCACAO", locacao.getDataRetirada());// adicionando os dados na coluna do bd
            values.put("DATADEVOLUCAO", locacao.getDataDevolucao());// adicionando os dados na coluna do bd
            values.put("QUILOMETRAGEM", locacao.getKm());// adicionando os dados na coluna do bd
            values.put("CPFCLIENTE", locacao.getCpfCliene());// adicionando os dados na coluna do bd
            values.put("CPFFUNCIONARIO", locacao.getCpfFuncionario());// adicionando os dados na coluna do bd
            values.put("PLACACARRO", locacao.getPlacaCarro());// adicionando os dados na coluna do bd
            values.put("SITUACAO", locacao.getSituaçaos());// adicionando os dados na coluna do bd
            if(locacao.getId()<=0)//validação para ediçao
                conexao.insertOrThrow("LOCACAO",null,values);
            else
                conexao.update("LOCACAO", values,"ID_LOCACAO=?",new String[]{locacao.getId()+""});

            conexao.close();
            Toast.makeText(this, "Yeahh inserção com sucesso",Toast.LENGTH_SHORT).show();
        }catch (SQLException e){
            Toast.makeText(this, "erro na inserção",Toast.LENGTH_SHORT).show();
        }
    }
    public void cancelar(View view){

    }
    public void listarClienteCpf(View view){
       Intent it = new Intent(LocacaoRetirada.this, ListarCpfCliente.class);
       startActivityForResult(it,50);
    }

    public void situacao (View view){
        //mostrar as opçoes para ativar ou inativar locacao
        AlertDialog.Builder msg= new AlertDialog.Builder(this);
        msg.setTitle("Informação");
        msg.setMessage("Digitar 'ativo' ou 'inativo'");
        msg.setNegativeButton("ok",null);
        msg.show();
    }
}
