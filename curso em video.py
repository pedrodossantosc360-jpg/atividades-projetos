class churrasco:
    """atividade do churrasco"""
    def __init__(self,pessoa=0):
        self.pessoa=pessoa
        self.carne=200*self.pessoa
        self.kilo=0
        

            

    def calcular(self):
        self.valor=50*self.pessoa
        i=0
        if self.pessoa>=5:
            while True :
                
                self.kilo=self.kilo+1
                i=i+5
                if i>=self.pessoa:
                    break
            c=self.pessoa%5
            if c >0:
                self.kilo=self.kilo-1
            for n in range (0,self.kilo,1):
                self.carne=self.carne-1000
        if self.kilo>0:
            return f"no churrasco vai {self.pessoa} para isso vamos precisar de  {self.kilo}kilo e {self.carne}gramas e o vai custar {self.valor}"
        else:
             if self.pessoa>0:
                return f"no churrasco vai {self.pessoa} para isso vamos precisar de {self.carne}gramas e o vai custar {self.valor}"
             else:
                return F"nao vai ter ninguem cancelar churasco"
gente=int(input("quantas pessoa vao"))
churras=churrasco(gente)
print(churras.calcular() )



