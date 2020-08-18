https://github.com/kaiomudkt/template-wp-sitePET-nacional


# GruposPET 
Esse projeto atende à demanda de divulgação de atividades do Programa de Educação Tutorial (PET), com o uso do Content Management System (CMS) Wordpress.
Por meio do API REST do Wordpress faz a republicação das postagens de cada instalação do Wordpress (site estaduais) para outra instalação do Wordpress (site nacional, o qual estamos agora).

o site Nacional vai conter um Custom Post Type do Wordpress que representa um PET, onde cada usuário do site Nacional receberá uma conta que está vinculada a um estado do Brasil, e cada usuário será responsável por criar e manter atualizado todos os PETs de seu estado, para cada estado será possível criar diversos usuários para dividir a responsábilidade.  
______________________________________________________________________________________________
________
### Criado por:
    Kaio Mitsuharu Lino Aida
    PETIANO VOLUNTÁRIO DESDE 2018/2 ATÉ 2020/2
    Curso: Sistemas de Informação FACOM/UFMS
    https://github.com/kaiomudkt
_______________________________________
    Kendy Yahiro
    Curso: Sistemas de Informação FACOM/UFMS
_______________________________________
    Vinicus Espindola
    PETIANO VOLUNTÁRIO DESDE 2018/2 ATÉ 2020/2
    Curso: Sistemas de Informação FACOM/UFMS
    https://github.com/Vinny1892
_______________________________________
    Apoiadores: Lucas Sandim (https://github.com/SandimL)
                Mateus Ragazzi (https://github.com/mateusragazzi)
                Diego Bulhões (https://github.com/DiegoBulhoes)
______________________________________________________________________________________________________

### Este projeto possui 5 partes:

	1. Template com a estrutura base para o site nacional, que dentro dele existirá o próximo item, que é o custom_post_type do tipo PET.

    2. Custom_post_type do Wordpress, que possui a lista de todos os PET de um determinado estado do Brasil. Este custom_post_type do tipo PET, existirá somente no site do PET Nacional, que ainda não temos o domínio para linkar. Precisamos manter em um único local com todos os dados de todos os PET do Brasil agrupados por estado, para que quando um estado do mapa do Brasil seja clicado, liste os PET por este estado, e consiga os dados consistente e atualizados, independente de qual site estadual esteja. 
    
    3. E como fazemos que um administrador de um site estadual consiga gerenciar os PETs de seu estado sendo que os dados estão sendo todos salvo no site nacional? Estamos selecioando um ou alguns tutores de cada estado para ser resposável por cadastrar todos os respectivos PETs de seu estado, para isso, criaremos sobe demanda um usuário no site nacional para cada um desses tutores responsável por cadastrar e gerenciar os PETs que existem em seu respectivo estado, neste momente, só será criado o PET em sí, que será utilizado para duas coisas, a primeira é para listar no mapa do brasil, a segunda é, quando for criar a conta de um tutor ou petiano no site estadual para que este possa realizar postagens de suas atividades realizadas, diga qual dos PETs cadastrado em seu estado no site nacional ele pertence, isso sera explicado melhor no site estadual, mas básicamente seu propósito é para saber qual o usuário pertence ao determinado PET, e quando este usuário criar um POST, o POST sera respectivamente do mesmo PET que seu autor, tudo isso automaticamente.

    4. Template com a estrutura base para sites estaduais (https://github.com/kaiomudkt/template-wp-sitePET-estadual), abra o arquivo README.md deste link para mais informações.

    5. Quando uma publicação é criado em um site estadual, automaticamente, será republicada para o site nacional, via API REST do Wordpress. Como existirá por volta de 26 instalações de sites estaduais, pensamos em listar no site nacional a última postagem de cada site estadual.

    6. Existem outras funções que podem ser implementadas futuaralmente nesta plataforma, como por exemplo um modelo de documento para relatório de projeto, ou relatório anual do PET, para manter uma base de dados unificada.
______________________________________________________________________________________________________


#### Tutorial de como utilizar do template Brasil:


1. apos instalar o wordpress;
2. baixe este tema chamado "GruposPET";
3. coloque o diretorio "GruposPET" (este tema) dentro do diretorio de temas do wordpress, chamado de "themes" que esta localizado no seguinte caminho: "wp-content/themes/";
4. entre no painel de administrador do wordpress com o link "http://seuDominio.com.br/wp-admin";
5. faça login com sua conta de 'super admin';
6. e vá até o menu "aparencia>temas";
7. ainda não será possível ativar o tema GruposPET pois falta a dependencia do tema pai 'onepress';
8. o próprio Wordpress pedirá para instalar o tema pai 'onepress';
9. agora clique em "ativar" o tema GrupostPET;
10. acaso o Wordpress não encontre o tema pai ‘onepress’ automaticamente para instala-lo, você mesmo terá que baixa-lo, neste link: https://wordpress.org/themes/onepress/
11. descompacte, e coloque o tema pai “onepress” dentro do diretório "wp-content/themes/", ao lado do tema filho “GruposPET”.
12. agora a dependência do tema filho "GruposPET" será atendida pelos arquivos do tema pai "onepress", então ative o tema "GruposPET".
13. Ainda logado como 'super admin', clique em "configurações" no painel do administrador, depois, clique em "links permanentes", na opção "Configurações comuns", marque a opção de "Nome do post", click em "salvar alterações"
14. Agora click na primeira aba do menu do 'super admin' chamada 'Painel', e procure a caixa de texto com o nome de "URL de cada Site Estadual", e para cada sigla de estado(UF) preencha sua respectiva URL, não esqueça de colocar 'http://' ou 'https://' no inicio. Para poder editar essa caixa, coloque o mouse no canto superior direito, vai aparecer um texto escrito 'configurar', click nele, e preencha os campos, e click no botão na parte de baixo da caixa chamado de 'enviar' para salvar suas alterações.
15. Crie 'banner'/'carrossel de imagens'/'slide show', na aba do menu chamada de "Banners", para a imagem do banner aparecer no carrossel de imagens, deve colocar no campo direito 'imagem destacada'/'thumbnail'.
16. Jamais/nunca cadastre PET usando a conta do 'super admin', então crie contas para os respectivos responsáveis de seu estado(UF), sempre no nível de acesso "autor",  e lembre de marca qual estado(UF) o novo usuário vai pertencer, no formulário de criar novo usuários, no campo que se chama 'Estado que gerencia', isso é vital para o sistema. Agora os novos usuário cadastrarãos os PETs de seu respectivo estado.
______________________________________________________________________________________________________

Para maiores detalhes, entre em contato com o PET Sistemas UFMS/FACOM Campo Grande.
** petsistemas.adm@gmail.com **
