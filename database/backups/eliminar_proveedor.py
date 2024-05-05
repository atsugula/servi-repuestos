import os
# constante global
const = 477
# append / &&&
def delete():
    products = open("productos_copy.sql", "r")
    lines = products.readlines()
    products.close()
    products = open("productos_copy.sql", "w")
    pos=int(const)
    linea=lines[pos]
    lines.remove(linea)
    for linea in lines:
        products.write(linea)
    products.close()
# Funcion que me dice el numero siguiente
def siguiente():
    global const
    const+=11
    print(const)
#
def seguir():
    delete()
    siguiente()
#Funcion para limpiar pantalla dependiendo del sistema operativo
def clear():
    if os.name == "nt":
        os.system("cls")
    else:
        os.system("clear")
#pregunta
# 587
for i in range(const):
    seguir()
    # clear()
