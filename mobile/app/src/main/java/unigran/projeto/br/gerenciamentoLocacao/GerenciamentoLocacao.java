package unigran.projeto.br.gerenciamentoLocacao;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import unigran.projeto.br.locaplus.Principal;
import unigran.projeto.br.locaplus.R;

public class GerenciamentoLocacao extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_gerenciamento_locacao);
    }
    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
    }
    public void cancelar(View view){
        Intent it = new Intent(this, Principal.class);
        startActivity(it);
    }
}
