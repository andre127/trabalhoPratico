package unigran.projeto.br.Listagem;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import unigran.projeto.br.gerenciamentoLocacao.LocacaoRetirada;
import unigran.projeto.br.locaplus.R;

public class ListarLocacao extends AppCompatActivity {
    private Button cadastrarLocação, devoluçao, voltar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listar_locacao);
    }

    public void voltar(View view){
        // Intent it = new Intent(this, );
        // startActivity(it);
    }
    public void cadastrar(View view){
        Intent it = new Intent(this, LocacaoRetirada.class);
        startActivity(it);
    }
    public void devolver(View view){
        // Intent it = new Intent(this, );
        // startActivity(it);
    }
}
