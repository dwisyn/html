import pickle
import cv2
#import numpy as np
import openface
import operator
import sys
import time
import os

# Dictionary for loaded model object
dim=96
def loadModel(nmModel):
    f = open(nmModel, 'rb')
    model = pickle.load(f)
    return model
        

def prediksiImg(imagePath,nrp,model,face_aligner,net):
    face= True
    img = cv2.imread(imagePath)
    if img is None:
        os.system('rm %s'%imagePath)        
        face=False

    else:
        aligned_img = face_aligner.align(dim, img, landmarkIndices=openface.AlignDlib.OUTER_EYES_AND_NOSE)
        if aligned_img is None:
            os.system('rm %s'%imagePath)            
            face=False
    
    if (face==False):
        return "not face, cant be predict"
    rep = net.forward(aligned_img)        
    predicted_proba = model.predict_proba([rep])
    res = {}
    prob = -1
    for i in range(len(model.classes_)):
        res[model.classes_[i]] = predicted_proba[0][i]
    res = sorted(res.items(), key=operator.itemgetter(1))
    res.reverse()

    rank = 0
        
    for key, val in res:
        rank += 1
        if key == nrp:
            prob = val
            break
    score = round(prob*100,2)	
    if prob == -1:
        return "ERR: Face data of " + nrp + " are currently not registered (500)"
            

    if rank <= 5 and score > 80:
        result = "ACCEPTED,"
            
    else:
        result = "REJECTED,"
        
    return "%s %s with score %g  rank %g" %(result,nrp,score,rank)  
   
                     



if __name__ == '__main__':    
    t = time.time()
    predictor_model = "shape_predictor_68_face_landmarks.dat"
    network_model = "nn4.small2.v1.t7"
    face_aligner = openface.AlignDlib(predictor_model)
    net = openface.TorchNeuralNet(network_model, dim)    
    model=loadModel('model.pkl')
    nrp = sys.argv[1]
    imagePath = sys.argv[2]
    
    r=prediksiImg(imagePath,nrp,model,face_aligner,net)
    elapsed = time.time() - t
    print "%s (Time Elpased = %g)"%(r,elapsed)
    

    
    
