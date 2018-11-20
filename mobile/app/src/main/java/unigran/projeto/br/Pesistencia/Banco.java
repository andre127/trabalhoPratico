package unigran.projeto.br.Pesistencia;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class Banco extends SQLiteOpenHelper {
 public Banco (Context context){
     super(context,"BANCOLOCAPLUS",null,1);
 }
    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        String sql ="CREATE TABLE IF NOT EXISTS CLIENTE(" +"ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,"
                +"NOME VARCHAR(45),"
                +" ENDERECO VARCHAR(15),"
                +" CPF VARCHAR(15),"
                +" RG VARCHAR(15),"
                +" CNH VARCHAR(15),"
                + "NUMERODEPENDENTES INTEGER);";

        sqLiteDatabase.execSQL(sql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
