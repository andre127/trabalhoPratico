package unigran.projeto.br.gerenciamentoLocacao;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.Intent;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.Classes.Locacao;
import unigran.projeto.br.Classes.Veiculo;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.locaplus.ListarCpfCliente;
import unigran.projeto.br.locaplus.MainActivity;
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
        //recebe o editar por bundle, recebe os dados da locação selecionada
        locacao =(Locacao) getIntent().getSerializableExtra("editar");
        //recebe o veiculo por bundle para pegar a placa do veiculo selecionado
        Veiculo veiculo =(Veiculo) getIntent().getSerializableExtra("locacao");
        // caso for null ou seja um cadastro novo
        if(locacao==null) {
            locacao = new Locacao();
            //locação recebe a placa do veiculo selecionado
            locacao.setPlacaCarro(veiculo.getPlaca());
        }
        //caso exita exista loccação
        if(locacao!=null){
            //todos os campos que forem diferente de vazio em locação,  passa os dados para os campos de edittext mapeados anteriormente
           if(locacao.getCpfCliene()!=null) cpfCliente.setText(locacao.getCpfCliene().toString());
            if(locacao.getCpfFuncionario()!=null) cpfFuncionario.setText(locacao.getCpfFuncionario().toString());
            if(locacao.getPlacaCarro()!=null) placa.setText(locacao.getPlacaCarro());
            if(locacao.getDataRetirada()!=null) dataRetirada.setText(locacao.getDataRetirada().toString());
            if(locacao.getKm()!=null) km.setText(locacao.getKm().toString());
            if(locacao.getDataDevolucao()!=null) dataDevolucao.setText(locacao.getDataDevolucao().toString());
            if(locacao.getSituaçaos()!=null) situacao.setText(locacao.getSituaçaos());
        }

    }

    @Override
    //metodo sobrescrito para receber os dados da intent e fechar
    //usado para listar os cpf dos clientes existentes e retornar um cpf selecionado
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode==50){
            cpfCliente.setText(data.getStringExtra("cpf"));
        }
    }
    //função parao botão de confirmar o cadastro ou ediçao dos dados de locação
    public void salvarLocacao(View view){
        if(valida()) {
            //caso for um cadastro de uma nov locação
            if (locacao == null)
                locacao = new Locacao();
            //pegando os dados das variaveis mapeadas e passando apara a classe pessoa
            locacao.setDataRetirada(Integer.parseInt(dataRetirada.getText().toString()));
            locacao.setDataDevolucao(Integer.parseInt(dataDevolucao.getText().toString()));
            locacao.setKm(Integer.parseInt(km.getText().toString()));
            locacao.setCpfCliene(Integer.parseInt(cpfCliente.getText().toString()));
            locacao.setCpfFuncionario(Integer.parseInt(cpfFuncionario.getText().toString()));
            locacao.setPlacaCarro(placa.getText().toString());
            locacao.setSituaçaos(situacao.getText().toString());
            //metodo para inserir os dados no BD
            inserir();
            finish();
        }

    }
    //validação para todos os campos serem preenchidos corretamente
    private boolean valida() {
        if (TextUtils.isEmpty(cpfFuncionario.getText())) {
            Toast.makeText(this, "Digite o cpf do fucionario", Toast.LENGTH_LONG).show();
            cpfFuncionario.requestFocus();
            return false;
        }
        if (TextUtils.isEmpty(cpfCliente.getText())) {
            Toast.makeText(this, "Digite o cpf do cliente", Toast.LENGTH_LONG).show();
            cpfCliente.requestFocus();
            return false;
        }
        if (TextUtils.isEmpty(placa.getText())) {
            Toast.makeText(this, "Digite a placa do carro", Toast.LENGTH_LONG).show();
            placa.requestFocus();
            return false;
        }
        if (TextUtils.isEmpty(dataRetirada.getText())) {
            Toast.makeText(this, "Digite a data de locação", Toast.LENGTH_LONG).show();
            dataRetirada.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(km.getText())){
            Toast.makeText(this,"Digite o km do carro",Toast.LENGTH_LONG).show();
            km.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(dataDevolucao.getText())){
            Toast.makeText(this,"Digite a data de devolução",Toast.LENGTH_LONG).show();
            dataDevolucao.requestFocus();
            return false;
        }
        if(!situacao.getText().equals("ativo") ||  !situacao.getText().equals("ATIVO") || !situacao.getText().equals("inaativo") || !situacao.getText().equals("INATIVO")){
            Toast.makeText(this,"escreva ativo ou inativo",Toast.LENGTH_LONG).show();
            situacao.requestFocus();
            return false;
        }


        return true;
    }


    private void inserir() {
        bd = new Banco(this);//instancia o bd
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
           if(locacao.getId()==null)//validação para ediçao
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
        //acao ao clicar para cancelar cadastro chamando a tela principal
        Intent it =  new Intent(LocacaoRetirada.this, MainActivity.class);
        startActivity(it);
    }
    public void listarClienteCpf(View view){
        //acao ao clicar que chama a tela de listagem de cpf dos clientes para escolha
       Intent it = new Intent(LocacaoRetirada.this, ListarCpfCliente.class);
       startActivityForResult(it,50);
    }
    public void listarFuncionarioCpf(View view){
        //acao ao clicar que chama a tela de listagem de cpf dos funcionarios para escolha
        //funcionarios nao foi feita a parte de listagem por isso nao funciona
        Toast.makeText(this, "parte de Funcionario sem tabela", Toast.LENGTH_SHORT).show();
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
