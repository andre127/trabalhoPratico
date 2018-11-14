package unigran.projeto.br.gerenciamentoLocacao;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.locaplus.R;

public class LocacaoDevolucao extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_locacao_devolucao);

    }
    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
        //kmsPercorridos =  - locacaoRetirada.getKmRetirada();
        //format.parse(e1.getText().toString());
    }
    public void cancelar(View view){
    }

}
