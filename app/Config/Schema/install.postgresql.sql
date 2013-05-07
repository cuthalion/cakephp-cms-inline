CREATE TABLE "public"."mensagens" (
	"id" serial NOT NULL,
	"titulo" varchar(255) NOT NULL,
	"nome" varchar(255) NOT NULL,
	"email" varchar(255) NOT NULL,
	"idResposta" integer NOT NULL,
	"mensagem" text NOT NULL,
	"lida" varchar(3) NOT NULL,
	"created" timestamp NOT NULL,
	PRIMARY KEY  ("id")
);


CREATE TABLE "public"."paginas" (
	"id" serial NOT NULL,
	"titulo" varchar(512) NOT NULL,
	"corpo" text NOT NULL,
	"title" varchar(512) NOT NULL,
	"descricao" text NOT NULL,
	"tags" varchar(512) NOT NULL,
	"slug" varchar(512) NOT NULL,
	"parent_id" integer DEFAULT NULL,
	"lft" integer DEFAULT NULL,
	"rght" integer DEFAULT NULL,
	"created" timestamp NOT NULL,
	"modified" timestamp NOT NULL,
	PRIMARY KEY  ("id")
);


CREATE TABLE "public"."seos" (
	"id" serial NOT NULL,
	"robots" text NOT NULL,
	"sitemap" text DEFAULT NULL,
	"modified" timestamp NOT NULL,
	PRIMARY KEY  ("id")
);

INSERT INTO "seos" ("id", "robots") VALUES
(1, "User-agent: * \r\nDisallow: /admin");


CREATE TABLE "public"."sliders" (
	"id" serial NOT NULL,
	"arquivo" varchar(250) NOT NULL,
	"titulo" varchar(250) NOT NULL,
	"descricao" text NOT NULL,
	"parent_id" integer DEFAULT NULL,
	"lft" integer NOT NULL,
	"rght" integer NOT NULL,
	"pagina_id" integer NOT NULL,
	PRIMARY KEY  ("id")
);


CREATE TABLE "public"."useres" (
	"id" serial NOT NULL,
	"nome" varchar(250) NOT NULL,
	"username" varchar(50) DEFAULT NULL,
	"email" varchar(500) NOT NULL,
	"password" varchar(50) DEFAULT NULL,
	"titulo" text NOT NULL,
	"created" timestamp ,
	"modified" timestamp ,
	"hash" varchar(40) NOT NULL,
	"acessos" integer NOT NULL,
	PRIMARY KEY  ("id")
);


