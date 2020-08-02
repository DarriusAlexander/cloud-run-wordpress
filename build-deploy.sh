gcloud builds submit --tag gcr.io/fullstacknet/fullstacknet:latest
gcloud beta run deploy --image gcr.io/fullstacknet/fullstacknet:latest --add-cloudsql-instances fsn
gcloud beta run services delete wp
gcloud beta run deploy wp --image gcr.io/fullstacknet/fullstacknet:latest \
  --add-cloudsql-instances mysql \
  --update-env-vars DB_HOST='104.197.142.150',DB_NAME=wp,DB_USER=darriush,DB_PASSWORD=Starwind1,CLOUDSQL_INSTANCE='fullstacknet:us-central1:fsn'