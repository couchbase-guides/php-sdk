<?php
// Connect to Couchbase Server

$cluster = new CouchbaseCluster("couchbase://localhost");
$bucket = $cluster->openBucket("default");

// Store a document
$result = $bucket->upsert('u:book1', array(
    "isbn" => "978-1-4919-1889-0",
    "name" => "Minecraft Modding with Forge",
    "cost" => "29.99")
));

var_dump($result);

// Retrieve a document
$result = $bucket->get("u:book1");
var_dump($result->value);


// Query with parameters
$query = CouchbaseN1qlQuery::fromString("SELECT * FROM `default`");
$rows = $bucket->query($query);
echo "Results:\n";
var_dump($rows);