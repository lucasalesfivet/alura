
public class TestaCondicional2 {
	public static void main(String[] args) {
		System.out.println("testando variavel");

		int idade = 16;
		int quantidadePessoas = 1;
		boolean acompanhado = quantidadePessoas >= 2;

		if (idade >= 18 || acompanhado) { //operador logicos "e" = &&
			System.out.println("Seja bem vindo");
		} else {
			System.out.println("Você não pode entrar");
		}
	}
}
