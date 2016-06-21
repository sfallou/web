#!/usr/bin/python2.7
# -*-coding:Utf-8 -*
from flask import *
from werkzeug import secure_filename
import os
import pickle
import time
import copy

####### Les Fonctions ###################


def factoriel(n):
	res=1
	n=n+1
	for i in range(1,n):
		res=res*i
	return res


def puissance(p,n):
	res=1
	for i in range(n):
		res=res*p
	return res



def calcul_po(lamda,mu,nb):  #
	po1=0
	theta=float(lamda)/float(mu)
	for i in range(int(nb+1)):
		po1=po1+puissance(theta,i)/factoriel(i)
	po2=puissance(theta,int(nb+1)/(factoriel(int(nb)*(int(nb-theta)))))	
		
	po=1/(po1+po2)	
	return po
	
def calcul_nu(lamda,mu,nb):  #Le nombre moyen de clients dans la file d'attente
	theta=float(lamda)/float(mu)
	m1=puissance(theta,int(nb)+1)*calcul_po(lamda,mu,nb)
	m2=int(nb)*factoriel(int(nb))*puissance(1-theta/int(nb),2)	
	m=m1/m2
	return m

def calcul_n(lamda,mu,nb):  #Le nombre moyen de cloients dans le systemes
	theta=float(lamda)/float(mu)
	n1=calcul_nu(lamda,mu,nb)+theta
	return n1

def calcul_t(lamda,mu,nb): #Temps moyen d'attente
	theta=float(lamda)/float(mu)
	tf=calcul_nu(lamda,mu,nb)/float(lamda)	
	return tf




################ Début ###############################


app = Flask(__name__)
app.secret_key = 'd66HR8pç"f_-àgjYYnc*df'


@app.route('/calcul', methods=['GET', 'POST'])
def calcul():
    error = None
    if request.method == 'GET':
    	message=request.args['message']
    	numero=request.args['numero']
    	tab=message.split()
        lamda=int(tab[0])
        mu=int(tab[1])
        nb=int(tab[2])
        theta=float(lamda/mu)
        nbs=nb
        rho=int(nbs-theta)
        if theta<1:
        	nu=calcul_nu(lamda,mu,nb)
        	tf=calcul_t(lamda,mu,nb)
        	n=calcul_n(lamda,mu,nb)
        	#return render_template('solution.html',lamda=lamda,mu=mu,nb=nb,theta=theta,nbs=nbs,rho=rho,nu=nu,tf=tf,n=n)
        	res=str(lamda)+"-"+str(mu)+"-"+str(nb)+"-"+str(theta)+"-"+str(nbs)+"-"+str(rho)+"-"+str(nu)+"-"+str(tf)+"-"+str(n)
        	try:
            		Monfichier="solution"+str(numero)+".txt"
            		Fichier = open(Monfichier,'w')
            		Fichier.write(res)
            		Fichier.close()
        	except:
            		error="Impossible de creer le fichier"
        	
        else:
        	return redirect(url_for('index'))

        

######################################### Appel du programme #################################

if __name__ == '__main__':
    app.run(debug=True)

