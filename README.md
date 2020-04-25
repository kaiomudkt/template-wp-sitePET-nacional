https://github.com/kaiomudkt/template-wp-sitePET-nacional


# GruposPET 
Esse projeto atende à demanda de divulgação do projeto "Programa de Educação Tutorial - PET", com o uso do CMS Wordpress.
Por meio do API REST do Wordpress faz a republicação das postagens de cada instalação do Wordpress (site estaduais) para outra instalação do Wordpress (site nacional, que é o qual que estamos).
______________________________________________________________________________________________________
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

    2. Custom_post_type do Wordpress, que possui a lista de todos os PET de um determinado estado do Brasil. Este custom_post_type do tipo PET, existirá somente no site do PET Nacional, que ainda não temos o domínio para linkar. Precisamos manter em um único local todos os dados de todos os PET do Brasil agrupados por estado, para que quando um estado do mapa do Brasil seja clicado, lista os PET por este estado, e consiga os dados consistente e atualizados, independente de qual site estadual esteja. 
    
    3. E como fazemos que um administrador de um site estadual consiga gerenciar os PETs de seu estado sendo que os dados estão sendo todos salvo no site nacional? Estamos selecioando um ou alguns tutores de cada estado para ser resposável por cadastrar todos os respectivos PETs de seu estado, para isso, criaremos sobe demanda um usuário no site nacional para cada um desses tutores responsável por cadastrar e gerenciar os PETs que existem em seu respectivo estado, neste momente, só será criado o PET em sí, que será utilizado para duas coisas, a primeira é para listar no mapa do brasil, a segunda é, quando for criar a conta de um tutor ou petiano no site estadual para que este possa realizar postagens de suas atividades realizadas, diga qual dos PETs cadastrado em seu estado no site nacional ele pertence, isso sera explicado melhor no site estadual, mas básicamente seu propósito é para saber que o USER pertence ao determinado PET, e quando este USER criar um POST, o POST sera respectivamente a este PET, tudo isso automaticamente.

    4. Template com a estrutura base para sites estaduais (https://github.com/kaiomudkt/template-wp-sitePET-estadual), abra o arquivo README.md deste link para mais informações.

    5. Quando uma publicação é criado em um site estadual, automaticamente, será republicada para o site nacional, via API REST do Wordpress. Como existirá por volta de 26 instalações de sites estaduais, pensamos em lista no site nacional a última postagem de cada site estadual.
______________________________________________________________________________________________________


#### Para utilizar do template Brasil:

1. Apos instalar o wordpress,
2. baixe este tema chamado "GruposPET",
3. coloque o diretorio "GruposPET" (este tema),
4. dentro do diretorio de temas do wordpress, chamado de "themes"
5. que esta localizado no seguinte caminho: "wp-content/themes/",
apos realizar essa etapa,
6. entre no painel de administrador do wordpress,
7. com o link "http://seuDominio.com.br/wp-admin",
8. entre em sua conta de admin,
9. e vá até o menu "aparencia > temas".
10. ainda não conseguirar ativar o tema GruposPET, 
11. pois falta a dependencia do tema KYMA(tema pai),
12. o próprio Wordpress pedirá para instalar o tema KYMA,
após feito isto,
13. clique em "ativar" o tema GrupostPET,
###### pronto =D
14. se o próprio Wordpress não sugerir as instalação do tema KYMA,
    instale manualmente no mesmo diretório "themes/", do lado do tema "GruposPET"  
______________________________________________________________________________________________________

Para maiores detalhes, entre em contato com o PET Sistemas UFMS/FACOM Campo Grande.
** petsistemas.adm@gmail.com **