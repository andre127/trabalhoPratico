package unigran.projeto.br.Classes;

import java.io.Serializable;

public class Cliente extends Pessoa  {
    private Integer id;
    private String cnh;
    private Integer numeroDependentes;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getCnh() {
        return cnh;
    }

    public void setCnh(String cnh) {
        this.cnh = cnh;
    }

    public Integer getNumeroDependentes() {
        return numeroDependentes;
    }

    public void setNumeroDependentes(Integer numeroDependentes) {
        this.numeroDependentes = numeroDependentes;
    }


}
