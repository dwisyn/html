import time
import numpy as np
from sklearn.pipeline import Pipeline
from sklearn.discriminant_analysis import LinearDiscriminantAnalysis
from sklearn.neighbors import KNeighborsClassifier
import pickle
import csv

          
if __name__=="__main__":
    t = time.time()
    data = []
    labels = []

    with open('data.csv', 'r') as f:
        reader = csv.reader(f)
        data = map(tuple, reader)

        
    with open('labels.csv', 'r') as f:
           reader = csv.reader(f)
           labels = list(reader)

    data     =np.array(data,dtype='float')
    labels   =np.array(labels)
    labels = labels.ravel()

    if len(np.unique(labels)) ==1:
        print "Labels only one class, cant create model"
    else:
   
        clf_final=KNeighborsClassifier(n_neighbors=1)
        clf = Pipeline([('lda', LinearDiscriminantAnalysis()),
                  ('clf', clf_final)
                  ])

        clf.fit(data,labels)
        with open('model.pkl', 'wb') as f:
            pickle.dump(clf, f) 
        


        elapsed = time.time() - t
        print "Save Model succeded Time Elpased = %g"%elapsed
    
    
    
    
