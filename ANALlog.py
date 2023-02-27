import re
from collections import defaultdict
import matplotlib.pyplot as plt
import time

menu_array = ["Baptiste.php", "Enzo.php", "Romain.php", "Simon.php", "Loginfo.php"]

while True:
    # Ouvrir le fichier de log
    with open('C:\\wamp64\\logs\\access.log') as f:
        content = f.readlines()

    # Initialiser les dictionnaires pour stocker le nombre de connexions par date et par adresse IP
    connections_by_date = defaultdict(int)
    connections_by_ip = defaultdict(int)
    connections_by_menu = defaultdict(int)

    # Analyser les entrées dans le fichier de log
    for line in content:
        # Extraire la date, l'adresse IP et le nom d'utilisateur (s'il est présent) de chaque entrée
        match = re.split(r' ',line)
        print(match)
        if match:
            date = match[3][2:13]
            ip = match[0]
            menu = match[6][1:]
            # Incrémenter le compteur pour la date, l'adresse IP et le nom d'utilisateur correspondants
            print(len(match))
            if len(match) >= 10:
                print(match[8])
                
                print(type(match[9]))
                if match[8][:3] == "302":
                    print("hello")
                    print(match[9])
                    if match[9][:3] == "910":
                        print("bye")
                        connections_by_date[date] += 1
                        connections_by_ip[ip] += 1
            for i in menu_array:
                if menu == i :
                    connections_by_menu[menu] += 1

        

    # Afficher le nombre de connexions par date
    print("Nombre de connexions par date ")
    for date, count in connections_by_date.items():
        print(f"{date} : {count}")

    # Afficher le nombre de connexions par adresse IP
    print("Nombre de connexions par adresse IP")
    for ip, count in connections_by_ip.items():
        print(f"{ip} : {count}")

    # Afficher le nombre de connexions par nom d'utilisateur
    print("Nombre de connexions par page ")    
    for menu, count in connections_by_menu.items():
        print(f"{menu} : {count}")

    # Tracer un graphique du nombre de connexions par date
    plt.bar(connections_by_date.keys(), connections_by_date.values())
    plt.title("Nombre de connexions par date")
    plt.xlabel("Date")
    plt.ylabel("Nombre de connexions")
    #plt.xticks(rotation=45)
    plt.savefig('graph1.png')
    plt.clf()
    
    # Tracer un graphique du nombre de connexions par adresse IP
    plt.bar(connections_by_ip.keys(), connections_by_ip.values())
    plt.title("Nombre de connexions par adresse IP")
    plt.xlabel("Adresse IP")
    plt.ylabel("Nombre de connexions")
    #plt.xticks(rotation=45)
    plt.savefig('graph2.png')
    plt.clf()
    

    # Tracer un graphique du nombre de connexions par nom d'utilisateur
    plt.bar(connections_by_menu.keys(), connections_by_menu.values())
    plt.title("Nombre de connexions par page")
    plt.xlabel("Nom des pages")
    plt.ylabel("Nombre de connexions")
    #plt.xticks(rotation=45)
    plt.savefig('graph3.png')
    plt.clf()
    time.sleep(0.1)
    print("------New refresh-----")