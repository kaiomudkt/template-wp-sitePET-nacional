https://github.com/kaiomudkt/template-wp-sitePET-nacional


# GruposPET 
Esse projeto atende à demanda de divulgação do projeto Programa de Educação Tutorial - PET, com o uso do CMS Wordpress, onde por meio do API REST do Wordpress faz a republicação das postagens de cada instalação do Wordpress para outra instalação do Wordpress
______________________________________________________________________________________________________
### Criado por:
    Kaio Mitsuharu Lino Aida
    PETIANO VOLUNTÁRIO DESDE 2018/2 ATÉ 2020/2
    Curso: Sistemas de Informação FACOM/UFMS
    https://github.com/kaiomudkt
_______________________________________
    Fernando Kendy Yahiro
    PETIANO BOLSISTA DESDE 2018/2 ATÉ ...
    Curso: Sistemas de Informação FACOM/UFMS
    https://github.com/kendyyahiro
_______________________________________
    Vinicus Espindola
    PETIANO VOLUNTÁRIO DESDE 2018/2 ATÉ 2020/2
    Curso: Sistemas de Informação FACOM/UFMS
    https://github.com/Vinny1892
______________________________________________________________________________________________________

### Este projeto possui 5 partes:

	1. Template com a estrutura base para o site nacional, que dentro dele existirá o próximo item, que é o custom_post_type do tipo PET.

    2. Custom_post_type do Wordpress, que possui a lista de todos os PET de um determinado estado do Brasil. Este custom_post_type do tipo PET, existirá somente no site do PET Nacional, que ainda não temos o domínio para linkar. Este custom_post_type do tipo PET, recebera a o CRUD (Create, Read, Update and Delete) de qualquer site estadual do PET, mas somente o administrador de cada site estadual terá essa permissão. Bom, por que estamos fazendo assim? precisamos manter em um único local todos os dados de todos os PET do Brasil, para que um site que use o mapa do Brasil que lista os PET por estado, consiga os dados mais atualizados. E como fazemos que um administrador de um site estadual consiga gerenciar os PETs de seu estado sendo que os dados estão sendo todos salvo no site Nacional? Por meio da API REST do Wordpress do site Nacional temos acessos ao CRUD deste custom_post_type do tipe PET do site nacional. E dentro do site estadual, quando o administrador logar, ele verá um plugin em seu site com o nome de "Gerenciador PET" entrando neste plugin poderá realizar o gerenciamentos dos PETs de seus estado.

    3. Template com a estrutura base para sites estaduais (que é este repositorio do Git que estamos agora), que possui um campo que é capaz de pegar o arquivo SVG que forma a imagem do mapa do Brasil, onde se consegue listar por estado os seus respectivos PETs.

    4. Plugin do Wordpress, que será instalado em todos os sites estaduais, para que esses, consiga gerenciar a criação, atualização e exclusão de seus respectivos PETs (de seus proprio estado). O local de armazenamento dos dados de cada PET será armazenado no custom_post_type do tipo PET do site nacional.

    5. Quando uma publicação é criado em um site estadual, automaticamente, será republicada para o site regional, como por exemplo Centro Oeste, e do site regional, será republicada novamente para o site nacional. Via API REST do Wordpress.
______________________________________________________________________________________________________


#### Para utilizar do template Brasil:

1. Apos instalar o wordpress,
2. baixe este tema chamado "GruposPET",
3. coloque o diretorio "GruposPET" (TEMA),
4. dentro do diretorio de temas do wordpress, chamado de "themes"
5. que esta localizado no seguinte caminho: "wp-content/themes",
apos realizar essa etapa,
6. entre no painel de administrador do wordpress,
7. com o link "http://seuDominio.com.br/wp-admin",
8. entre em sua conta de admin,
9. e vá até o menu "aparencia > temas".
10. ainda não conseguirar ativar o tema GruposPET, 
11. pois falta a dependencia do tema KYMA,
12. o próprio Wordpress pedirá para instalar o tema KYMA,
após feito isto,
13. clique em "ativar" o tema GrupostPET,
###### pronto =D
14. se o próprio Wordpress não sugerir as instalação do tema KYMA,
    instale manualmente no mesmo diretório "themes", do lado do tema "GruposPET"  
______________________________________________________________________________________________________

Para maiores detalhes, entre em contato com o PET Sistemas UFMS/FACOM Campo Grande.
** petsistemas.adm@gmail.com **
______________________________________________________________________________________________________


WordPress REST API - login dos administradores de site estaduais para realizar o CRUD dos PETs de seu estado - validação via - JWT (JSON Web Token).


faça o download do plugin "JWT Authentication for WP REST API V2",
instalar e ativar o plugin, link:
https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/

Gera senha aleatorias:
 https://api.wordpress.org/secret-key/1.1/salt/

No arquivo "wp-config.php" implemente  essas duas linha de código mostradas a baixo

//define('JWT_AUTH_SECRET_KEY', 'your-top-secret-key');
//define('JWT_AUTH_CORS_ENABLE', true);


Nós tivemos problemas com a autencicação via JWT, pois os headers de autorização não estavam sendo passados ​​para as páginas php porque ter o PHP-FPM ativado evita isso.
https://wordpress.org/support/topic/fix-basic-authentication-jwt_auth_bad_auth_header-error/

# template-wp-sitePET-nacional




__________________________
explicar tema filho
__________________________