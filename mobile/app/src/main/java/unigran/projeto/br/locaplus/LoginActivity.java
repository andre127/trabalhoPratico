package unigran.projeto.br.locaplus;

import android.app.AlertDialog;
import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import java.util.LinkedList;
import java.util.List;

import unigran.projeto.br.Classes.Cliente;
import unigran.projeto.br.Pesistencia.Banco;

public class LoginActivity extends AppCompatActivity {
    private EditText login;
    private EditText senha;
    private SQLiteDatabase conexao;
    private Banco bd;
    private String comparaLogin;
    private Cliente cliente;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        login = findViewById(R.id.etLogin);
        senha = findViewById(R.id.etSenha);
        conexaoBD();
    }
    private void conexaoBD() {
        try {
            bd= new Banco(this);
        }catch (SQLException ex){
            AlertDialog.Builder msg= new AlertDialog.Builder(this);
            msg.setTitle("Erro");
            msg.setMessage("Erro de conexão");
            msg.setNegativeButton("ok",null);
            msg.show();
        }
    }
    public void registrar(View view){
        Intent it = new Intent(this, CadastroCliente.class);
        startActivity(it);
    }

    public void entrar(View view){
        Cursor res= conexao.rawQuery("SELECT * FROM cliente WHERE LOGIN = ? AND SENHA = ?",new String[]{login.getText().toString(), senha.getText().toString()});
        if(res.getCount()>0){
            Intent it = new Intent(this, MainActivity.class);
            startActivity(it);
        }else{
            Toast.makeText(this, "Errrou seu bosta", Toast.LENGTH_SHORT).show();
        }

    }
}
