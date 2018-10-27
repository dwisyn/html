import pickle
import cv2
#import numpy as np
import openface
import operator


# Dictionary for loaded model object
dim=96
def loadModel(nmModel):
    f = open(nmModel, 'rb')
    model = pickle.load(f)
    return model
        

def prediksiImg(imagePath,nrp,model,face_aligner,net):
    print "Start prediction process "
    img = cv2.imread(imagePath)
    aligned_img = face_aligner.align(dim, img, landmarkIndices=openface.AlignDlib.OUTER_EYES_AND_NOSE)
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

    if prob == -1:
        print "ERR: Face data of " + nrp + " are currently not registered (500)"
            

    if rank <= 5:
        print "Prediction result for " + nrp + " accepted"
        print "Confidence level: " + str(round(prob*100, 2)) + "%"
        print "Probability rank: " + str(rank)
            
    else:
        print "Prediction result for " + nrp + " rejected"
        print "Confidence level: " + str(round(prob*100, 2)) + "%"
        print "Probability rank: " + str(rank)
            



if __name__ == '__main__':    
    print "Loading neural network model nn4.small2.v1.t7 ..."
    print "Loading shape_predictor_68_face_landmarks ..."
    predictor_model = "shape_predictor_68_face_landmarks.dat"
    network_model = "nn4.small2.v1.t7"
    face_aligner = openface.AlignDlib(predictor_model)
    net = openface.TorchNeuralNet(network_model, dim)
    print "Neural networks and shape predictor model loaded!"
    model=loadModel('model.pkl')
    imagePath="Uji2Wajah/5113100022/5113100022 - M. Syaiful Jihad A_0.png"
    prediksiImg(imagePath,'5113100022',model,face_aligner,net)
    

    
    
