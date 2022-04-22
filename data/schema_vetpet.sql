-- Arquivo que contera os objetos do banco de dados em SQL


-- ---------------------------------------------------
Tabelas de controle - schema petvet_admin
-- ---------------------------------------------------

CREATE SEQUENCE petvet_admin.seq_user_id
INCREMENT 1
MINVALUE 10 
MAXVALUE 32000
START 10
NOCYCLE;

CREATE TABLE petvet_admin.user (
id SMALLINT NOT NULL DEFAULT nextval('seq_user_id'),
email VARCHAR(255) NOT NULL,
loja_id INTEGER NULL,
status TINYINT NOT NULL DEFAULT 0, -- 0 criado nao ativo, 1 ativo, 2 bloqueado, 3 deletado (ou sera removido em breve)
full_name VARCHAR(255) NOT NULL,
professional_id INT NOT NULL,
CONSTRAINT user_id_pkey PRIMARY KEY (id),
CONSTRAINT user_email_ukey UNIQUE (email)
);

ALTER SEQUENCE petvet_admin.seq_user_id OWNED BY user.id;
