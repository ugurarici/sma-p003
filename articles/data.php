<?php

$articlesJson = file_get_contents('articles.json');
$articles = json_decode($articlesJson, true);

// $articles = [
//     [
//         "title" => "1st Article's Title",
//         "content" => "1st Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
//     [
//         "title" => "2nd Article's Title",
//         "content" => "2nd Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
//     [
//         "title" => "Uğur bunu değiştirmek istedi, hayta çocuk işte",
//         "content" => "3rd Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
//     [
//         "title" => "4th Article's Title",
//         "content" => "4th Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
//     [
//         "title" => "5th Article's Title",
//         "content" => "5th Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
//     [
//         "title" => "6th Article's Title",
//         "content" => "6th Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
//     [
//         "title" => "7th Article's Title",
//         "content" => "7th Article's Content, Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui mollitia nihil ullam voluptatum minus praesentium commodi porro saepe amet dolorem facere, eos excepturi. Odio quia aspernatur maiores sint? Exercitationem, repudiandae."
//     ],
// ];
