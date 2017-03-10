Blog
====

Provides a simple blog, and exposes an API.


## Install

``` bash
git clone git@github.com:alcalyn/ftvblog.git
cd ftvblog

make -i

# In certain cases:
chmod -R 777 var/*
```


## Usage

Go to:

- http://0.0.0.0:8000/ to access to the blog
- http://0.0.0.0:8000/api to access to the API
- http://0.0.0.0:8000/doc to access to the API documentation
- http://0.0.0.0:8001 to access to the PHPMyAdmin instance


## Testing

Run phpunit tests with:

``` bash
make test
```


## License

This project is under [MIT](LICENSE).
