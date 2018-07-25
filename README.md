# Simple Budget - Documentation

## Summary

- [*About*](#about)
- [*QuickSheets*](#quicksheets)
- [*Instruction*](#instruction)
- [*Ports*](#ports)
- [*Dev-ops*](#dev-ops)


## About

Simple Budget.
A simple way to handle budget for daily life purpose.
Documentation coming soon...

## QuickSheets

- Stop all containers, removing then up (will not re built images)

```
sudo docker stop $(sudo docker ps -a -q) ;sudo docker rm $(sudo docker ps -a -q);
sudo docker-compose up -d;
sudo docker-compose build --no-cache;
```

## Instruction

```
sudo docker-compose up -d;
```

## Ports

| Application     | Port |
|-----------------|------|
| api             | 0008 |
| postgres        | 1008 |
| redis           | 2008 |
| adminer         | 3008 |
| redis-commander | 4008 |

## Dev-ops

Build and push an image (api)

```
$ sudo docker login
$ cd docker/api
$ sudo docker build -t api .
$ sudo docker tag api omarsadek/simplebudget_api
$ sudo docker push omarsadek/simplebudget_api
```
