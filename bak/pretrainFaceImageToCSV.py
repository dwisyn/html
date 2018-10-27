#import numpy as np
import time
from imutils import paths
import cv2
import openface
import shutil
import os    
import errno
import csv

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
#    pathSRC = "Uji2Wajah"#WAJAH-ALL"
    pathSRC = "WAJAH-ALL"
    pathDEST = "WAJAH-OK"
    print "Loading neural network model nn4.small2.v1.t7 ..."
    print "Loading shape_predictor_68_face_landmarks ..."
    predictor_model = "shape_predictor_68_face_landmarks.dat"
    network_model = "nn4.small2.v1.t7"
    face_aligner = openface.AlignDlib(predictor_model)
    net = openface.TorchNeuralNet(network_model, dim)
    print "Neural networks and shape predictor model loaded!"
    

    # loop over the training images
    oldLabel=''
    countLabel=0
    firstCount=True
    for imagePath in paths.list_images(pathSRC):
        imagePath = imagePath.replace("\\","")
        lbl = imagePath.split("/")[-2]
        if lbl != oldLabel and firstCount==False:            
            print "Label %s berjumlah %d" %(oldLabel,countLabel)
            if countLabel <10:
                print "Label %s [%d] harus re-foto terlalu <10 sampel"%(oldLabel,countLabel)
                print "##############################################"
            else:
                print "Label %s succeded convert to csv" %oldLabel
                writeToFile(data,labels)
                
                
                data=[]
                labels=[]
            os.rmdir("%s/%s"%(pathSRC,oldLabel))    
            oldLabel=lbl
            countLabel=0
        
        img = cv2.imread(imagePath)
        if img is None:
            print "Image %s can't be read" %imagePath
            os.remove(imagePath)
            print "Image %s remove ... done" %imagePath
            continue
#        print "image loaded %s : "%imagePath
        aligned_img = face_aligner.align(dim, img, landmarkIndices=openface.AlignDlib.OUTER_EYES_AND_NOSE)
        if aligned_img is None:
            print "Image %s can't be align" %imagePath
            os.remove(imagePath)
            print "Image %s remove ... done" %imagePath
            continue
#        print " image aligned %s : "%imagePath
        rep = net.forward(aligned_img)
        labels.append(lbl)
        data.append(rep)
        if firstCount == True:
            firstCount=False
            oldLabel=lbl
        countLabel=countLabel+1
        moveFolder =  imagePath.replace(pathSRC,pathDEST)
        checkDirectory(moveFolder)
        shutil.move(imagePath, moveFolder)
        
        
    ## simpan yg terakhir
    print "Label %s berjumlah %d" %(oldLabel,countLabel)
    if countLabel <10:
        print "Label %s [%d] harus re-foto terlalu <10 sampel"%(oldLabel,countLabel)
        print "##############################################"
    else:
        print "Label %s succeded convert to csv" %oldLabel
        writeToFile(data,labels)
    os.rmdir("%s/%s"%(pathSRC,oldLabel))        
    elapsed = time.time() - t

    print "Time Elpased = %g"%elapsed
    
    
    
    
