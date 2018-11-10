package unigran.projeto.br.gerenciamentoLocacao;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.locaplus.R;

public class LocacaoDevolucao extends AppCompatActivity {
    private EditText numeroDevolucao, placaDevolucao, dataDevolucao, kmDevolucao;
    private EditText dias, kmsPercorridos, precoFinal;
    private LocacaoRetirada locacaoRetirada = new LocacaoRetirada();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_locacao_devolucao);
        numeroDevolucao = findViewById(R.id.etNumeroDevolucao);
        placaDevolucao = findViewById(R.id.etPlacaDevolucao);
        dataDevolucao = findViewById(R.id.etDataDevolucao);
        kmDevolucao = findViewById(R.id.etKmDevolucao);
    }
    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
        //kmsPercorridos =  - locacaoRetirada.getKmRetirada();
        //format.parse(e1.getText().toString());
    }
    public void cancelar(View view){
        Intent it = new Intent(this, GerenciamentoLocacao.class);
        startActivity(it);
    }

}
