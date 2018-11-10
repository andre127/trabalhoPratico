package unigran.projeto.br.Classes;

public class Cliente extends Pessoa {
   private String cnh;
   private Integer numeroDeDependente;

    public String getCnh() {
        return cnh;
    }

    public void setCnh(String cnh) {
        this.cnh = cnh;
    }

    public Integer getNumeroDeDependente() {
        return numeroDeDependente;
    }

    public void setNumeroDeDependente(Integer numeroDeDependente) {
        this.numeroDeDependente = numeroDeDependente;
    }

    @Override
    public String toString() {
        return "CNH: "+getCnh()+"Dependente: "+getNumeroDeDependente();
    }
}
