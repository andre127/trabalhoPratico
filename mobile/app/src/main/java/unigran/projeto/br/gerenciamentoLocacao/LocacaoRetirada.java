package unigran.projeto.br.gerenciamentoLocacao;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import unigran.projeto.br.locaplus.R;

public class LocacaoRetirada extends AppCompatActivity {
    private EditText numeroRetirada, placaRetirada, dataRetirada, kmRetirada;

    public EditText getDataRetirada() {
        return dataRetirada;
    }

    public void setDataRetirada(EditText dataRetirada) {
        this.dataRetirada = dataRetirada;
    }

    public EditText getKmRetirada() {
        return kmRetirada;
    }

    public void setKmRetirada(EditText kmRetirada) {
        this.kmRetirada = kmRetirada;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_locacao_retirada);
        numeroRetirada = findViewById(R.id.etNumeroRetirada);
        placaRetirada = findViewById(R.id.etPlacaRetirada);
        dataRetirada = findViewById(R.id.etDataRetirada);
        kmRetirada = findViewById(R.id.etKmRetirada);
    }
    public void confirmar(View view){
        Toast.makeText(this, "foiiii", Toast.LENGTH_SHORT).show();
    }
    public void cancelar(View view){
        Intent it = new Intent(this, GerenciamentoLocacao.class);
        startActivity(it);
    }
}
