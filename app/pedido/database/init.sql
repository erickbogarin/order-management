
CREATE SEQUENCE fabricante_seq;

CREATE TABLE fabricante (
                fabr_codigo INTEGER NOT NULL DEFAULT nextval('fabricante_seq'),
                fabr_nome VARCHAR(60) NOT NULL,
                CONSTRAINT fabricante_pk PRIMARY KEY (fabr_codigo)
);


ALTER SEQUENCE fabricante_seq OWNED BY fabricante.fabr_codigo;

CREATE SEQUENCE categoria_seq;

CREATE TABLE categoria (
                cate_codigo INTEGER NOT NULL DEFAULT nextval('categoria_seq'),
                cate_nome VARCHAR(60) NOT NULL,
                CONSTRAINT categoria_pk PRIMARY KEY (cate_codigo)
);


ALTER SEQUENCE categoria_seq OWNED BY categoria.cate_codigo;

CREATE SEQUENCE produto_seq;

CREATE TABLE produto (
                prod_codigo INTEGER NOT NULL DEFAULT nextval('produto_seq'),
                prod_nome VARCHAR(160) NOT NULL,
                cate_codigo INTEGER NOT NULL,
                fabr_codigo INTEGER NOT NULL,
                prod_valor NUMERIC(10,2) NOT NULL,
                prod_estoque INTEGER NOT NULL,
                CONSTRAINT produto_pk PRIMARY KEY (prod_codigo)
);


ALTER SEQUENCE produto_seq OWNED BY produto.prod_codigo;

CREATE SEQUENCE forma_pagamento_seq;

CREATE TABLE forma_pagamento (
                fopa_codigo INTEGER NOT NULL DEFAULT nextval('forma_pagamento_seq'),
                fopa_nome VARCHAR(60) NOT NULL,
                CONSTRAINT forma_pagamento_pk PRIMARY KEY (fopa_codigo)
);


ALTER SEQUENCE forma_pagamento_seq OWNED BY forma_pagamento.fopa_codigo;

CREATE SEQUENCE usuario_seq;

CREATE TABLE usuario (
                usua_codigo INTEGER NOT NULL DEFAULT nextval('usuario_seq'),
                usua_nome VARCHAR(120) NOT NULL,
                usua_email VARCHAR(100) NOT NULL,
                usua_senha VARCHAR(60) NOT NULL,
                usua_tipo SMALLINT NOT NULL,
                usua_habilitado BOOLEAN NOT NULL,
                usua_auth_key VARCHAR(32) NOT NULL,
                CONSTRAINT usuario_pk PRIMARY KEY (usua_codigo)
);
COMMENT ON COLUMN usuario.usua_tipo IS '1 = Admin
2 = Gerente
3 = Vendedor';


ALTER SEQUENCE usuario_seq OWNED BY usuario.usua_codigo;

CREATE SEQUENCE estado_esta_seq;

CREATE TABLE estado (
                esta_codigo INTEGER NOT NULL DEFAULT nextval('estado_esta_seq'),
                esta_nome VARCHAR(60) NOT NULL,
                CONSTRAINT estado_pk PRIMARY KEY (esta_codigo)
);


ALTER SEQUENCE estado_esta_seq OWNED BY estado.esta_codigo;

CREATE SEQUENCE municipio_seq_1;

CREATE TABLE municipio (
                muni_codigo INTEGER NOT NULL DEFAULT nextval('municipio_seq_1'),
                muni_nome VARCHAR(60) NOT NULL,
                esta_codigo INTEGER NOT NULL,
                CONSTRAINT municipio_pk PRIMARY KEY (muni_codigo)
);


ALTER SEQUENCE municipio_seq_1 OWNED BY municipio.muni_codigo;

CREATE SEQUENCE cliente_clien_seq;

CREATE TABLE cliente (
                clien_codigo INTEGER NOT NULL DEFAULT nextval('cliente_clien_seq'),
                clien_nome VARCHAR(120) NOT NULL,
                clien_tipo SMALLINT NOT NULL,
                clien_cpf_cnpj VARCHAR(14) NOT NULL,
                clien_email VARCHAR(100) NOT NULL,
                muni_codigo INTEGER NOT NULL,
                CONSTRAINT cliente_pk PRIMARY KEY (clien_codigo)
);


ALTER SEQUENCE cliente_clien_seq OWNED BY cliente.clien_codigo;

CREATE SEQUENCE pedido_seq;

CREATE TABLE pedido (
                pedi_codigo INTEGER NOT NULL DEFAULT nextval('pedido_seq'),
                pedi_data_criacao TIMESTAMP NOT NULL,
                pedi_data_alteracao TIMESTAMP NOT NULL,
                clien_codigo INTEGER NOT NULL,
                usua_codigo INTEGER NOT NULL,
                fopa_codigo INTEGER NOT NULL,
                CONSTRAINT pedido_pk PRIMARY KEY (pedi_codigo)
);


ALTER SEQUENCE pedido_seq OWNED BY pedido.pedi_codigo;

CREATE SEQUENCE pedido_produto_seq;

CREATE TABLE pedido_produto (
                pepr_codigo INTEGER NOT NULL DEFAULT nextval('pedido_produto_seq'),
                pedi_codigo INTEGER NOT NULL,
                pepr_nome VARCHAR(160) NOT NULL,
                pepr_quantidade INTEGER NOT NULL,
                pepr_valor NUMERIC(10,2) NOT NULL,
                prod_codigo INTEGER NOT NULL,
                CONSTRAINT pedido_produto_pk PRIMARY KEY (pepr_codigo)
);


ALTER SEQUENCE pedido_produto_seq OWNED BY pedido_produto.pepr_codigo;

ALTER TABLE produto ADD CONSTRAINT fabricante_produto_fk
FOREIGN KEY (fabr_codigo)
REFERENCES fabricante (fabr_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE produto ADD CONSTRAINT categoria_produto_fk
FOREIGN KEY (cate_codigo)
REFERENCES categoria (cate_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido_produto ADD CONSTRAINT produto_pedido_produto_fk
FOREIGN KEY (prod_codigo)
REFERENCES produto (prod_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido ADD CONSTRAINT forma_pagamento_pedido_fk
FOREIGN KEY (fopa_codigo)
REFERENCES forma_pagamento (fopa_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido ADD CONSTRAINT usuario_pedido_fk
FOREIGN KEY (usua_codigo)
REFERENCES usuario (usua_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE municipio ADD CONSTRAINT estado_municipio_fk
FOREIGN KEY (esta_codigo)
REFERENCES estado (esta_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE cliente ADD CONSTRAINT municipio_cliente_fk
FOREIGN KEY (muni_codigo)
REFERENCES municipio (muni_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido ADD CONSTRAINT cliente_pedido_fk
FOREIGN KEY (clien_codigo)
REFERENCES cliente (clien_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE pedido_produto ADD CONSTRAINT pedido_pedido_produto_fk
FOREIGN KEY (pedi_codigo)
REFERENCES pedido (pedi_codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
