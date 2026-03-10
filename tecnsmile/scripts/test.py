from flask import Flask, render_template,request

app = Flask(__name__)

@app.route('/')

def index():
    return render_template ('form.html')

@app.route('/test',methods=['POST'])
def processar_dados():
    if request.method =='POST':
        nome=request.form['conversa']
        return f'voce envio um texto'
   
if __name__ =='__main__':
    app.run(debug=True)
