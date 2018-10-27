#!/usr/bin/env python
import cv2
import openface
import os    
import sys
            
if __name__=="__main__":    
    predictor_model = "shape_predictor_68_face_landmarks.dat"
    network_model = "nn4.small2.v1.t7"
    nmFile=sys.argv[1]
    dim=96
    face_aligner = openface.AlignDlib(predictor_model)
    #net = openface.TorchNeuralNet(network_model, dim)        
    img = cv2.imread(nmFile)
    face= True
    if img is None:
        os.system('rm %s'%nmFile)
        #os.remove(nmFile)
        face=False
    else:
        aligned_img = face_aligner.align(dim, img, landmarkIndices=openface.AlignDlib.OUTER_EYES_AND_NOSE)
        if aligned_img is None:
            os.system('rm %s'%nmFile)
            #os.remove(nmFile)
            face=False
    if face == True:        
        print "face detected, add to repository "
    else:
        print "not face, no add to repository  "
