
public class TestaEscopo {
	public static void main(String[] args) {
		System.out.println("testando variavel");

		int idade = 18;
		int quantidadePessoas = 1;
		//boolean acompanhado = quantidadePessoas >= 2;
		boolean acompanhado;
		if (quantidadePessoas >= 2) {
			acompanhado = true;
		} else {
			acompanhado = false;
		}
		
		if (idade >= 18 || acompanhado) { //operador logicos "e" = &&
			System.out.println("Seja bem vindo");
		} else {
			System.out.println("Você não pode entrar");
		}
	}
}
