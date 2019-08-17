import pandas as pd

data = pd.read_excel (r'C:\Users\91908\Desktop\Invoice .xlsx') 
df = pd.DataFrame(data, columns= ['Task ','Status '])
print (df)
