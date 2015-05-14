###################
Resolução dos exercícios
###################

Esse repositorio é referente a resolução dos exercícios.

O controller que contém as resoluções é Convenia.php, para acessar pela url /convenia .

*******************
Documentação
*******************
Para resolução do problema foi utilizado, codeigniter (php), jquery (js), boostrap (css e html)

Também foi criado como extra um mural de mensagens, para criar a tabela é só rodar o create table abaixo.

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(100) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

Como padrão do codeigniter as configurações do banco de dados fica em /application/config/database.php.
Então só colocar os dados do banco local lá.

Para tirar dúvidas só criar issue.

.. image:: https://d2weczhvl823v0.cloudfront.net/reginaldojunior/convenia/trend.png
   :alt: Bitdeli badge
   :target: https://bitdeli.com/free

