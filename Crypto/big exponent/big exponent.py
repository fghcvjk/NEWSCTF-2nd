from Crypto.Util.number import *
from sympy import *
from gmpy2 import *
from random import *
from Crypto.PublicKey import RSA
#from py import flag

def gen_key():
    p,q=getPrime(1024),getPrime(1024)
    n,lcm=p*q,(p-1)*(q-1)//gcd(p-1,q-1)
    e1 = invert(getPrime(730), lcm)
    e2 = invert(getPrime(730), lcm)

    return (e1,e2,n),(p,q)
    
def encrypt_e1(e1):
    ep=getPrime(2040)
    n=e1*ep
    assert e1>ep
    phi=(ep-1)*(e1-1)
    d=nextprime(int(iroot(n,4)[0])*int(iroot(n,200)[0]))
    e=invert(d,phi)

    return (e,n)
    
def encrypt_e2(e2):
    eq=getPrime(2040)
    assert e2<eq
    n=e2*eq
    phi=(eq-1)*(e2-1)
    d=nextprime(int(iroot(n,4)[0]/3)-getrandbits(30))
    e=invert(d,phi)

    return (e,n)

def encrypt(flag,e,n):
    m=bytes_to_long(flag)

    return long_to_bytes(pow(m,e,n))

def export_key(file_name,e,n):
    pubkey = RSA.construct((n,e))
    f = open(file_name,'wb')
    f.write(pubkey.export_key())
    f.close()

def main():
    E=65537
    pubkey,prikey=gen_key()
    e1,e2,n=pubkey
    E1,N1=encrypt_e1(e1)
    export_key(r"pubkey1.pem",E1,N1)
    E2,N2=encrypt_e2(e2)
    export_key(r"pubkey2.pem",E2,N2)
    export_key(r"pubkey3.pem",E,n)

    cipher=encrypt(flag,E,n)
    f=open(r"flaggg.enc","wb")
    f.write(cipher)
    f.close()

main()
