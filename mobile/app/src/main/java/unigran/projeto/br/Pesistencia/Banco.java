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
        String sql ="";

        sqLiteDatabase.execSQL(sql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
