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

public class CadastrarCliente extends AppCompatActivity {
    private Cliente cliente;
    private EditText nome;
    private EditText rg;
    private EditText cpf;
    private EditText endereco;
    private EditText cnh;
    private EditText numDependente;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cliente);
        nome= findViewById(R.id.editNome);
        rg= findViewById(R.id.editRG);
        cpf= findViewById(R.id.editCpf);
        endereco= findViewById(R.id.editEndereco);
        cnh= findViewById(R.id.editCNH);
        numDependente= findViewById(R.id.editNumDependente);
    }
    public void salvar(View view){

        if(valida()){
            if(cliente==null) cliente=new Cliente();
                cliente.setNome(nome.getText().toString());
                cliente.setRg(rg.getText().toString());
                cliente.setCpf(cpf.getText().toString());
                cliente.setEndereco(endereco.getText().toString());
                cliente.setCnh(cnh.getText().toString());
                cliente.setNumeroDeDependente(Integer.parseInt(numDependente.getText().toString()));

            inserir();
            finish();
        }
    }
    private boolean valida() {
        if(TextUtils.isEmpty(nome.getText())){
            Toast.makeText(this,"Entre com o nome",Toast.LENGTH_LONG).show();
            nome.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(rg.getText())){
            Toast.makeText(this,"Entre com o numero RG",Toast.LENGTH_LONG).show();
            rg.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(cpf.getText())){
            Toast.makeText(this,"Entre com o numero CPF",Toast.LENGTH_LONG).show();
            cpf.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(endereco.getText())){
            Toast.makeText(this,"Entre com o endereço",Toast.LENGTH_LONG).show();
            endereco.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(cnh.getText())){
            Toast.makeText(this,"Entre com o numero da CNH",Toast.LENGTH_LONG).show();
            cnh.requestFocus();
            return false;
        }
        if(TextUtils.isEmpty(numDependente.getText())){
            Toast.makeText(this,"Entre com o numero de Dependentes",Toast.LENGTH_LONG).show();
            numDependente.requestFocus();
            return false;
        }

        return true;

    }
    private SQLiteDatabase conexao;
    private Banco bd;
    private void inserir(){
        bd=new Banco(this);

        try {
            conexao=bd.getWritableDatabase();
            ContentValues values= new ContentValues();
            values.put("NOME",cliente.getNome());
            values.put("RG",cliente.getRg());
            values.put("CPF", cliente.getCpf());
            values.put("ENDERECO",cliente.getEndereco());
            values.put("CNH",cliente.getCnh());
            values.put("DEPENDENTE",cliente.getNumeroDeDependente());

            if(cliente.getId()<=0)
                conexao.insertOrThrow("CLIENTE",null,values);
            else
                conexao.update("CLIENTE",values,"ID=?",new String[]{cliente.getId()+""});
            conexao.close();
            Toast.makeText(this, "Sucesso",Toast.LENGTH_LONG).show();
        }catch ( SQLException ex){
            Toast.makeText(this, "erro na inserção",Toast.LENGTH_LONG).show();
        }

    }
}
