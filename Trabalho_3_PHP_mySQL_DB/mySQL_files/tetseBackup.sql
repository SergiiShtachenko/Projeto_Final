PGDMP                          w           dbo_onlinePlatformAMF    10.8    10.8 &    :           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ;           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            <           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            =           1262    32869    dbo_onlinePlatformAMF    DATABASE     �   CREATE DATABASE "dbo_onlinePlatformAMF" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Portugal.1252' LC_CTYPE = 'Portuguese_Portugal.1252';
 '   DROP DATABASE "dbo_onlinePlatformAMF";
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            >           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    4                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            ?           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1                        3079    32879 	   uuid-ossp 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;
    DROP EXTENSION "uuid-ossp";
                  false    4            @           0    0    EXTENSION "uuid-ossp"    COMMENT     W   COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';
                       false    2            �            1259    33510    cliente    TABLE     m  CREATE TABLE public.cliente (
    guid character varying DEFAULT public.uuid_generate_v4() NOT NULL,
    nrcliente integer NOT NULL,
    nome character varying NOT NULL,
    nif character varying NOT NULL,
    morada character varying,
    telefon character varying,
    ativo boolean DEFAULT true NOT NULL,
    regdate timestamp without time zone DEFAULT now()
);
    DROP TABLE public.cliente;
       public         postgres    false    2    4    4            �            1259    33508    cliente_nrcliente_seq    SEQUENCE     �   CREATE SEQUENCE public.cliente_nrcliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.cliente_nrcliente_seq;
       public       postgres    false    198    4            A           0    0    cliente_nrcliente_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.cliente_nrcliente_seq OWNED BY public.cliente.nrcliente;
            public       postgres    false    197            �            1259    33737    enc_prod    TABLE     �  CREATE TABLE public.enc_prod (
    encomenda character varying NOT NULL,
    produto character varying NOT NULL,
    tamanho integer NOT NULL,
    qtd integer NOT NULL,
    price numeric DEFAULT 0.0 NOT NULL,
    reference character varying,
    nome character varying,
    descricao character varying,
    ativo boolean DEFAULT true NOT NULL,
    regdate timestamp without time zone DEFAULT now(),
    CONSTRAINT enc_prod_price_check CHECK ((price >= (0)::numeric))
);
    DROP TABLE public.enc_prod;
       public         postgres    false    4            �            1259    33639 	   encomenda    TABLE     �  CREATE TABLE public.encomenda (
    guid character varying DEFAULT public.uuid_generate_v4() NOT NULL,
    dataencomenda timestamp without time zone DEFAULT now(),
    dataentrega timestamp without time zone NOT NULL,
    nrencomenda character varying NOT NULL,
    responcavel character varying NOT NULL,
    cliente character varying NOT NULL,
    ativo boolean DEFAULT true NOT NULL,
    regdate timestamp without time zone DEFAULT now()
);
    DROP TABLE public.encomenda;
       public         postgres    false    2    4    4            �            1259    33721    produto    TABLE     �  CREATE TABLE public.produto (
    guid character varying DEFAULT public.uuid_generate_v4() NOT NULL,
    reference character varying NOT NULL,
    nome character varying NOT NULL,
    descricao character varying NOT NULL,
    foto character varying,
    price numeric(5,2) DEFAULT 0 NOT NULL,
    ativo boolean DEFAULT true NOT NULL,
    regdate timestamp without time zone DEFAULT now()
);
    DROP TABLE public.produto;
       public         postgres    false    2    4    4            �            1259    33620 
   utilizador    TABLE     �  CREATE TABLE public.utilizador (
    guid character varying DEFAULT public.uuid_generate_v4() NOT NULL,
    email character varying NOT NULL,
    palavrapasse character varying NOT NULL,
    nome character varying,
    telefon character varying,
    cliente character varying NOT NULL,
    permissao integer DEFAULT 0 NOT NULL,
    ativo boolean DEFAULT true NOT NULL,
    regdate timestamp without time zone DEFAULT now()
);
    DROP TABLE public.utilizador;
       public         postgres    false    2    4    4            �
           2604    33514    cliente nrcliente    DEFAULT     v   ALTER TABLE ONLY public.cliente ALTER COLUMN nrcliente SET DEFAULT nextval('public.cliente_nrcliente_seq'::regclass);
 @   ALTER TABLE public.cliente ALTER COLUMN nrcliente DROP DEFAULT;
       public       postgres    false    198    197    198            3          0    33510    cliente 
   TABLE DATA               ^   COPY public.cliente (guid, nrcliente, nome, nif, morada, telefon, ativo, regdate) FROM stdin;
    public       postgres    false    198   9/       7          0    33737    enc_prod 
   TABLE DATA               w   COPY public.enc_prod (encomenda, produto, tamanho, qtd, price, reference, nome, descricao, ativo, regdate) FROM stdin;
    public       postgres    false    202   20       5          0    33639 	   encomenda 
   TABLE DATA               x   COPY public.encomenda (guid, dataencomenda, dataentrega, nrencomenda, responcavel, cliente, ativo, regdate) FROM stdin;
    public       postgres    false    200   O0       6          0    33721    produto 
   TABLE DATA               `   COPY public.produto (guid, reference, nome, descricao, foto, price, ativo, regdate) FROM stdin;
    public       postgres    false    201   l0       4          0    33620 
   utilizador 
   TABLE DATA               r   COPY public.utilizador (guid, email, palavrapasse, nome, telefon, cliente, permissao, ativo, regdate) FROM stdin;
    public       postgres    false    199   .1       B           0    0    cliente_nrcliente_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.cliente_nrcliente_seq', 5, true);
            public       postgres    false    197            �
           2606    33523    cliente cliente_nif_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_nif_key UNIQUE (nif);
 A   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_nif_key;
       public         postgres    false    198            �
           2606    33521    cliente cliente_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (guid);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public         postgres    false    198            �
           2606    33748    enc_prod enc_prod_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.enc_prod
    ADD CONSTRAINT enc_prod_pkey PRIMARY KEY (encomenda, produto, tamanho);
 @   ALTER TABLE ONLY public.enc_prod DROP CONSTRAINT enc_prod_pkey;
       public         postgres    false    202    202    202            �
           2606    33650    encomenda encomenda_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.encomenda
    ADD CONSTRAINT encomenda_pkey PRIMARY KEY (guid);
 B   ALTER TABLE ONLY public.encomenda DROP CONSTRAINT encomenda_pkey;
       public         postgres    false    200            �
           2606    33736    produto produto_nome_key 
   CONSTRAINT     S   ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_nome_key UNIQUE (nome);
 B   ALTER TABLE ONLY public.produto DROP CONSTRAINT produto_nome_key;
       public         postgres    false    201            �
           2606    33732    produto produto_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (guid);
 >   ALTER TABLE ONLY public.produto DROP CONSTRAINT produto_pkey;
       public         postgres    false    201            �
           2606    33734    produto produto_reference_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_reference_key UNIQUE (reference);
 G   ALTER TABLE ONLY public.produto DROP CONSTRAINT produto_reference_key;
       public         postgres    false    201            �
           2606    33633    utilizador utilizador_email_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.utilizador
    ADD CONSTRAINT utilizador_email_key UNIQUE (email);
 I   ALTER TABLE ONLY public.utilizador DROP CONSTRAINT utilizador_email_key;
       public         postgres    false    199            �
           2606    33631    utilizador utilizador_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.utilizador
    ADD CONSTRAINT utilizador_pkey PRIMARY KEY (guid);
 D   ALTER TABLE ONLY public.utilizador DROP CONSTRAINT utilizador_pkey;
       public         postgres    false    199            �
           2606    33749     enc_prod enc_prod_encomenda_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.enc_prod
    ADD CONSTRAINT enc_prod_encomenda_fkey FOREIGN KEY (encomenda) REFERENCES public.encomenda(guid);
 J   ALTER TABLE ONLY public.enc_prod DROP CONSTRAINT enc_prod_encomenda_fkey;
       public       postgres    false    200    2731    202            �
           2606    33754    enc_prod enc_prod_produto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.enc_prod
    ADD CONSTRAINT enc_prod_produto_fkey FOREIGN KEY (produto) REFERENCES public.produto(guid);
 H   ALTER TABLE ONLY public.enc_prod DROP CONSTRAINT enc_prod_produto_fkey;
       public       postgres    false    201    202    2735            �
           2606    33656     encomenda encomenda_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.encomenda
    ADD CONSTRAINT encomenda_cliente_fkey FOREIGN KEY (cliente) REFERENCES public.cliente(guid);
 J   ALTER TABLE ONLY public.encomenda DROP CONSTRAINT encomenda_cliente_fkey;
       public       postgres    false    2725    198    200            �
           2606    33651 $   encomenda encomenda_responcavel_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.encomenda
    ADD CONSTRAINT encomenda_responcavel_fkey FOREIGN KEY (responcavel) REFERENCES public.utilizador(guid);
 N   ALTER TABLE ONLY public.encomenda DROP CONSTRAINT encomenda_responcavel_fkey;
       public       postgres    false    199    200    2729            �
           2606    33634 "   utilizador utilizador_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.utilizador
    ADD CONSTRAINT utilizador_cliente_fkey FOREIGN KEY (cliente) REFERENCES public.cliente(guid);
 L   ALTER TABLE ONLY public.utilizador DROP CONSTRAINT utilizador_cliente_fkey;
       public       postgres    false    199    198    2725            3   �   x�}��J1�s�)� �%M?�ݛz�Eģ�~���Neg���ԃ`��I��F�����$�K��R�ZC�f	4�?�d�DipD�h&��kR5�c��S/��u`fc��6`��#�b}������L~���M�њ0�(HbB�FF����P� ï�v�]i�S�销�Mt����R�p`�x��h��b0-�]O�����w���kR��y�5�2��69K���6~?Ӭ�����4}�yV�      7      x������ � �      5      x������ � �      6   �   x���=��0�k���͌dF�@�,aݦKr�q�&x���~����|9j��2J��ªJ���K��#_H��9���t:�2ُ����h���/���Z�-K�=�arћŐ��B�|�r@�УmS)��� q�4j��ԒItP	�$
�x�<����N�i������\]�4o�AT      4   �   x�m�=V�1�|�p<��\�r����g�����s��bng�����B�2�y�t/�1����{c�·m�x�K��8��"��������deБ�g
h?�=��.��Wc$�����"��6���52�� �`��ʞ�c/:���>ZQF���\��81�W�	��9��XiǕ�֨#��0���5f�^o�u� ��O�     