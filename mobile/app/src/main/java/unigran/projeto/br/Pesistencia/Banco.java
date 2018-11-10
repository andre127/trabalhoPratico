package unigran.projeto.br.Pesistencia;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import unigran.projeto.br.locaplus.CadastrarCliente;

public class Banco extends SQLiteOpenHelper {

    public Banco(Context context) {
        super(context, "BANCODADOS", null, 3);
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        String sql ="CREATE TABLE IF NOT EXISTS PESSOA(" +"ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL," +"NOME VARCHAR(45)," +" TELEFONE VARCHAR(15),"+ "IDADE INTEGER);";

        sqLiteDatabase.execSQL(sql);

        //StringBuilder stringBuilder= new StringBuilder();
        //stringBuilder.append("CREATE TABLE  IF NOT EXISTS PESSOA(");
        //stringBuilder.append("ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,");
        // stringBuilder.append("NOME TEXT);");
        //sqLiteDatabase.execSQL(stringBuilder.toString());

    }


    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
        //  String sql="ALTER TABLE PESSOA ADD IDADE INTEGER; ";
        String sql="ALTER TABLE PESSOA ADD TELEFONE VARCHAR(15);";

        sqLiteDatabase.execSQL(sql);

    }
}