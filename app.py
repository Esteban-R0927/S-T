#Importamos Flask y render_template
from flask import Flask
from flask import render_template
#Generamos solicitud de Flask en app
app = Flask(__name__)

#Generamos primer ruta con @app.route
@app.route("/")
#La ruta siempre respoden con una función
def inicio():
    return render_template('inicio.html')

#Generamos primer ruta con @app.route
@app.route("/quienes-somos/")
#La ruta siempre respoden con una función
def QuienesSomos():
	return render_template('quienes-somos.html')

#Generamos primer ruta con @app.route
@app.route("/clientes/")
#La ruta siempre respoden con una función
def clientes():
	return render_template('clientes.html')

@app.route("/nuestros-productos/")
#La ruta siempre respoden con una función
def NuestrosProductos():
	return render_template('nuestros-productos.html')

@app.route("/muestras-realizadas/")
#La ruta siempre respoden con una función
def MuestrasRealizadas():
	return render_template('muestras-realizadas.html')

#Validamos que estemos en este módulo

# @app.route("/mensaje")
# def mensaje():
#     return "Hola Mundo!"
if __name__ == "__main__":
    app.run(debug = True, port= 8080)