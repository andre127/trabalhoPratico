package unigran.projeto.br.Classes;

public class Locacao {
    private Integer dataRetirada;
    private Integer dataDevolucao;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    private Integer id;
    private Float kmFinal;

    public Float getKmFinal() {
        return kmFinal;
    }

    public void setKmFinal(Float kmFinal) {
        this.kmFinal = kmFinal;
    }

    public Integer getDataRetirada() {
        return dataRetirada;
    }

    public void setDataRetirada(Integer dataRetirada) {
        this.dataRetirada = dataRetirada;
    }

    public Integer getDataDevolucao() {
        return dataDevolucao;
    }

    public void setDataDevolucao(Integer dataDevolucao) {
        this.dataDevolucao = dataDevolucao;
    }


    public void encerrarLocacao(Integer data, Float km){

    }
    public void manterLocacao(){

    }
    public void selecionarLocacao(){

    }
}
