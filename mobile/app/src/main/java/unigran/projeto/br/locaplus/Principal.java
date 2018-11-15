package unigran.projeto.br.locaplus;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import unigran.projeto.br.Listagem.ListarCliente;
import unigran.projeto.br.gerenciamento.GerVeiculo;

public class Principal extends AppCompatActivity {

    Button btGerVeiculo;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_principal);
    }

    public void gerVei(View view){
        Intent it = new Intent(this, unigran.projeto.br.gerenciamento.GerVeiculo.class);
        startActivity(it);
    }
    public void gerCliente(View view){
        Intent it = new Intent(this, ListarCliente.class);
        startActivity(it);
    }
}
