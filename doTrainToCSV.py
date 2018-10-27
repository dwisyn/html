import time
import os    
import errno
import cv2
import sys
from imutils import paths
import openface
import csv


#os.environ['CUDA_VISIBLE_DEVICES']='-1'

def writeToFile(data,labels):
    with open("data.csv", "a") as f:
        writer = csv.writer(f)
        writer.writerows(data)
    
    with open('labels.csv', 'a') as f:
        for item in labels:
            print >> f, item

def checkDirectory(filename):
    if not os.path.exists(os.path.dirname(filename)):
        try:
            os.makedirs(os.path.dirname(filename))
        except OSError as exc: # Guard against race condition
            if exc.errno != errno.EEXIST:
                raise

          
if __name__=="__main__":
    t = time.time()
    data = []
    labels = []
    dim = 96
    pathSRC = sys.argv[1]
    pathDEST = "face-trained/%s"%pathSRC  
    
    predictor_model = "shape_predictor_68_face_landmarks.dat"
    network_model = "nn4.small2.v1.t7"
    face_aligner = openface.AlignDlib(predictor_model)
    net = openface.TorchNeuralNet(network_model, dim)    
    c=0
    for imagePath in paths.list_images(pathSRC):
        c=c+1
        imagePath = imagePath.replace("\\","")
        img = cv2.imread(imagePath)
        if img is None:
            c=c-1
            os.system('rm %s'%(imagePath))             
            continue
        aligned_img = face_aligner.align(dim, img, landmarkIndices=openface.AlignDlib.OUTER_EYES_AND_NOSE)
        if aligned_img is None:
            c=c-1
            os.system('rm %s'%(imagePath))             
            continue        
        rep = net.forward(aligned_img)
        #print "test: %d"%len(rep)
        labels.append(pathSRC)
        data.append(rep)
    writeToFile(data,labels)     
    checkDirectory(pathDEST)
    os.system('mv %s %s'%(pathSRC,pathDEST)) 
      
    elapsed = time.time() - t
    print "Convert %d to CSV succeded Time Elpased = %g"%(c,elapsed)
    
    
    
    
