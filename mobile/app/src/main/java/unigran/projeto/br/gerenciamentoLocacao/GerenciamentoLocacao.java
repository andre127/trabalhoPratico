package unigran.projeto.br.gerenciamentoLocacao;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;

import unigran.projeto.br.locaplus.R;

public class GerenciamentoLocacao extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_gerenciamento_locacao);
    }
    public void devolver(View view){
        Intent it = new Intent(this, LocacaoDevolucao.class);
        startActivity(it);
    }
    public void retirar(View view){
        Intent it = new Intent(this, LocacaoRetirada.class);
        startActivity(it);
    }
}
