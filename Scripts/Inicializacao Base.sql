
INSERT INTO `papel`(`TIPO`, `DESCRICAO`, `OBSERVACAO`) VALUES ('B','BIBLIOTECARIO','PAPEL PARA PERMISSÃO DE CADASTROS GERAIS E DE ATENDENTES.');
INSERT INTO `papel`(`TIPO`, `DESCRICAO`, `OBSERVACAO`) VALUES ('A','ATENDENTE','CADASTRO DE ATENDENTE DA BIBIOTECA.');
INSERT INTO `papel`(`TIPO`, `DESCRICAO`, `OBSERVACAO`) VALUES ('U','USUARIO','CADASTRO DE USUARIO DA BIBLIOTECA.');
INSERT INTO `papel`(`TIPO`, `DESCRICAO`, `OBSERVACAO`) VALUES ('O','OUTRO','CADASTRO DE OUTROS TIPOS DE PESSOAS.');

-- dados da tabela `users`
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'teste@teste.com', NULL, '$2y$10$kKbEbRYLTkCSJZ4xQ/buvO09UhbsVn/DplynFUSKiOf2fCIEje8BO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 18:35:32', '2022-10-16 18:35:32'),
(2, 'julian Mello de Souza', 'julian.esteio@gmail.com', NULL, '$2y$10$CgRTdubyeDEwiDRTBQ2ReeF0TU3F8pGd9ghJs9eWbQOMDuIcGu52G', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 19:17:56', '2022-10-16 19:17:56'),
(3, 'Eliana Doroti Da Silva Cardias', 'eliana.cardias@hotmail.com', NULL, '$2y$10$RBYP27bYWlcMqxPXWNhcoOjiYY7/mBI.pSmBuCQdBY0NV8IWiNk8O', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-16 20:00:38', '2022-10-16 20:00:38'),
(4, 'usuario', 'teste2@teste.com', NULL, '$2y$10$tkvX7PZWKRp0qvVdot3lHuGABRhCLkWn91OgMCl.c68r9TtKmMw8m', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-17 00:49:03', '2022-10-17 00:49:03');

INSERT INTO `pessoapapel`( `user_id`, `papel_id`, `created_at`, `updated_at`, `dataAtualizacao`) VALUES ('1','1',CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);