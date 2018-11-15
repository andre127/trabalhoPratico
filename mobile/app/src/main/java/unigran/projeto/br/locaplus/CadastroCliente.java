package unigran.projeto.br.locaplus;

import android.content.ContentValues;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.Classes.Cliente;
import unigran.projeto.br.Pesistencia.Banco;

public class CadastroCliente extends AppCompatActivity {
    private Cliente cliente;
    private EditText nome;
    private EditText endereco;
    private EditText cpf;
    private EditText rg;
    private EditText cnh;
    private EditText dependentes;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cadastro_cliente);
        nome= findViewById(R.id.etNomeCliente);
        endereco=findViewById(R.id.etEnderecoCliente);
        cpf=findViewById(R.id.etCpfCliente);
        rg=findViewById(R.id.etRgCliente);
        cnh= findViewById(R.id.etCnhCliente);
        dependentes=findViewById(R.id.etDependentes);

        cliente= (Cliente)getIntent().getSerializableExtra("cliente");
        if(cliente!=null){
            nome.setText(cliente.getNome());
            endereco.setText(cliente.getEndereco());
            cpf.setText(cliente.getCpf());
            rg.setText(cliente.getRg());
            cnh.setText(cliente.getCnh());
            dependentes.setText(cliente.getNumeroDependentes().toString());
        }
    }
    public void salvar(View view){
       if(valida()){
            if (cliente==null)cliente= new Cliente();

            cliente.setNome(nome.getText().toString());
            cliente.setEndereco(endereco.getText().toString());
            cliente.setCpf(cpf.getText().toString());
            cliente.setRg(rg.getText().toString());
            cliente.setCnh(cnh.getText().toString());
            cliente.setNumeroDependentes(Integer.parseInt(dependentes.getText().toString()));

           inserir();
           finish();
        }
    }
    private boolean valida() {
        if (TextUtils.isEmpty(nome.getText())) {
            Toast.makeText(this, "Entre com o nome", Toast.LENGTH_LONG).show();
            nome.requestFocus();
            return false;
        }
        if (TextUtils.isEmpty(endereco.getText())) {
            Toast.makeText(this, "Entre com o Endereco", Toast.LENGTH_LONG).show();
            endereco.requestFocus();
            return false;
        }
        if (TextUtils.isEmpty(cpf.getText())) {
            Toast.makeText(this, "Entre com o cpf", Toast.LENGTH_LONG).show();
            cpf.requestFocus();
            return false;
        }
        if (TextUtils.isEmpty(rg.getText())) {
            Toast.makeText(this, "Entre com o RG", Toast.LENGTH_LONG).show();
            rg.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(cnh.getText())){
            Toast.makeText(this,"Entre com a CNH",Toast.LENGTH_LONG).show();
            cnh.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(dependentes.getText())){
            Toast.makeText(this,"Entre com o numerp de dependentes",Toast.LENGTH_LONG).show();
            dependentes.requestFocus();
            return false;
        }

        return true;
    }

    private SQLiteDatabase conexao;
    private Banco bd;
    private void inserir(){
        bd= new Banco(this);
        try {
            conexao=bd.getWritableDatabase();
            ContentValues  values= new ContentValues();

            values.put("NOME",cliente.getNome());
            values.put("ENDERECO",cliente.getEndereco());
            values.put("CPF", cliente.getCpf());
            values.put("RG",cliente.getRg());
            values.put("CNH",cliente.getCnh());
            values.put("NUMERODEPENDENTES", cliente.getNumeroDependentes());
            if(cliente.getId()==null)
                conexao.insertOrThrow("CLIENTE",null,values);
            else
               conexao.update("CLIENTE",values,"ID=?",new String[]{cliente.getId()+""});


            conexao.close();
            Toast.makeText(this, "Sucesso",Toast.LENGTH_LONG).show();
        } catch (SQLException ex){
            Toast.makeText(this, "erro na inserção",Toast.LENGTH_LONG).show();
        }
    }

}
