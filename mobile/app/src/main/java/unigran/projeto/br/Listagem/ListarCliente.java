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
import android.widget.ListView;
import android.widget.Toast;
import java.util.LinkedList;
import java.util.List;

import unigran.projeto.br.Classes.Cliente;
import unigran.projeto.br.Pesistencia.Banco;
import unigran.projeto.br.locaplus.CadastroCliente;
import unigran.projeto.br.locaplus.MainActivity;
import unigran.projeto.br.locaplus.R;

public class ListarCliente extends AppCompatActivity {
    private ListView lista;
    private SQLiteDatabase conexao;
    private Banco bd;

    // Funcão para listar o cliente
    private List listar(){

        conexao=bd.getReadableDatabase();
        List clientes = new LinkedList();
        Cursor res= conexao.rawQuery("SELECT * FROM CLIENTE", null);

        if(res.getCount()>0){
            res.moveToFirst();
            do{
                Cliente p = new Cliente();
                p.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
                p.setNome(res.getString(res.getColumnIndexOrThrow("NOME")));
                p.setEndereco(res.getString(res.getColumnIndexOrThrow("ENDERECO")));
                p.setCpf(res.getString(res.getColumnIndexOrThrow("CPF")));
                p.setRg(res.getString(res.getColumnIndexOrThrow("RG")));
                p.setCnh(res.getString(res.getColumnIndexOrThrow("CNH")));
                p.setNumeroDependentes(res.getInt(res.getColumnIndexOrThrow("NUMERODEPENDENTES")));
                p.setLogin(res.getString(res.getColumnIndexOrThrow("LOGIN")));
                p.setSenha(res.getString(res.getColumnIndexOrThrow("SENHA")));

                clientes.add(p);
            }while (res.moveToNext());
        }
        return  clientes;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listar_cliente);
        lista=findViewById(R.id.listarCliente);
        acoes();
        conexaoBD();
    }
    // função para conectar com o banco
    private void conexaoBD() {
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
    //Função para mandar cliente selecionado para editar na tela de cadastro
    private void acoes() {
        lista.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override

            public void onItemClick(AdapterView adapterView,View view, int i, long l){
                Intent it = new Intent(ListarCliente.this,CadastroCliente.class);
                Cliente cliente = (Cliente) adapterView.getItemAtPosition(i);
                it.putExtra("cliente", cliente);
                startActivity(it);
            }
        });


    }
    public void novoCadastroCliente(View view){

        Intent it = new Intent(ListarCliente.this,CadastroCliente.class);
        startActivity(it);
    }
    public void telaInicialCliente(View view){

        Intent it = new Intent(ListarCliente.this,MainActivity.class);
        startActivity(it);
    }
    // Listagem do Cliente 
    @Override
    protected void onResume() {
        super.onResume();
        ArrayAdapter<Cliente> arrayAdapter = new ArrayAdapter<Cliente>(ListarCliente.this,android.R.layout.simple_expandable_list_item_1, listar());
       lista.setAdapter(arrayAdapter);
    }

}
